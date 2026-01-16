<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\TrainingModule;
use App\Models\UserModuleProgress;
use Illuminate\Http\Request;

class MyClassController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        // Get all completed/paid registrations for classes only
        $query = Registration::with(['training.modules'])
            ->where('email', $user->email)
            ->where('status', 'completed')
            ->whereHas('training', function ($q) {
                // Fetch all categories (class, webinar, workshop, digital_class, etc.)
                $q->where('is_active', true);
            });

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('training', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by difficulty level
        if ($request->filled('level')) {
            $levels = (array) $request->level;
            $query->whereHas('training', function ($q) use ($levels) {
                $q->whereIn('level', $levels);
            });
        }

        // Filter by Category
        if ($request->filled('category')) {
            $categories = (array) $request->category;
            $query->whereHas('training', function ($q) use ($categories) {
                $q->whereIn('category', $categories);
            });
        }

        // Filter by Type
        if ($request->filled('type')) {
            $types = (array) $request->type;
            $query->whereHas('training', function ($q) use ($types) {
                $q->whereIn('type', $types);
            });
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->join('trainings', 'registrations.training_id', '=', 'trainings.id')
                    ->orderBy('trainings.price', 'asc')
                    ->select('registrations.*');
                break;
            case 'price_desc':
                $query->join('trainings', 'registrations.training_id', '=', 'trainings.id')
                    ->orderBy('trainings.price', 'desc')
                    ->select('registrations.*');
                break;
            case 'title':
                $query->join('trainings', 'registrations.training_id', '=', 'trainings.id')
                    ->orderBy('trainings.title', 'asc')
                    ->select('registrations.*');
                break;
            default: // latest
                $query->latest();
                break;
        }

        $myClasses = $query->paginate(12);

        // Pass available filters
        $filters = [
            'category' => ['class', 'webinar', 'workshop'],
            'level' => ['beginner', 'intermediate', 'expert'],
            'type' => ['online', 'offline', 'hybrid'],
        ];

        return view('my-classes.index', compact('myClasses', 'filters'));
    }

    public function show($slug)
    {
        $user = auth()->user();

        // Find training by slug
        $training = \App\Models\Training::where('slug', $slug)->firstOrFail();

        // Verify user has access (completed registration)
        $registration = Registration::where('email', $user->email)
            ->where('training_id', $training->id)
            ->where('status', 'completed')
            ->firstOrFail();

        $training->load('modules');

        // Get user's progress for all modules
        $userProgress = UserModuleProgress::where('user_id', $user->id)
            ->whereIn('training_module_id', $training->modules->pluck('id'))
            ->get()
            ->keyBy('training_module_id');

        // Calculate overall progress
        $totalModules = $training->modules->count();
        $completedModules = $userProgress->where('is_completed', true)->count();
        $progressPercentage = $totalModules > 0 ? round(($completedModules / $totalModules) * 100) : 0;

        return view('my-classes.show', compact('training', 'userProgress', 'progressPercentage'));
    }

    public function certificate($trainingId)
    {
        $user = auth()->user();

        // Verify user has access and completed the training
        $registration = Registration::where('email', $user->email)
            ->where('training_id', $trainingId)
            ->where('status', 'completed')
            ->firstOrFail();

        $training = $registration->training()->with('modules')->firstOrFail();

        // Check completion progress
        $userProgress = UserModuleProgress::where('user_id', $user->id)
            ->whereIn('training_module_id', $training->modules->pluck('id'))
            ->where('is_completed', true)
            ->count();

        $totalModules = $training->modules->count();

        if ($totalModules > 0 && $userProgress < $totalModules) {
            return back()->with('error', 'Please complete all modules to generate certificate.');
        }

        return view('my-classes.certificate', compact('training', 'user', 'registration'));
    }

    public function markComplete(Request $request, $moduleId)
    {
        $user = auth()->user();
        $module = TrainingModule::findOrFail($moduleId);

        // Verify user has access to this training
        $hasAccess = Registration::where('email', $user->email)
            ->where('training_id', $module->training_id)
            ->where('status', 'completed')
            ->exists();

        if (!$hasAccess) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $isQuiz = $module->type === 'quiz' || (!empty($module->questions) && count($module->questions ?? []) > 0);

        if ($isQuiz) {
            $score = $request->input('score', 0);

            $progress = UserModuleProgress::firstOrNew([
                'user_id' => $user->id,
                'training_module_id' => $moduleId,
            ]);

            // If already completed, just return info
            if ($progress->is_completed) {
                return response()->json([
                    'success' => true,
                    'completed' => true,
                    'score' => $progress->score,
                    'attempts' => $progress->attempts,
                    'message' => 'Quiz already passed.'
                ]);
            }

            // Check max attempts
            $maxAttempts = $module->max_attempts ?? 3;
            if ($progress->attempts >= $maxAttempts) {
                return response()->json([
                    'success' => false,
                    'completed' => false,
                    'score' => $progress->score,
                    'attempts' => $progress->attempts,
                    'message' => 'Maximum attempts reached.'
                ]);
            }

            // Update progress
            $progress->attempts = ($progress->attempts ?? 0) + 1;
            $progress->score = $score;

            $minScore = $module->min_score ?? 70;
            $passed = $score >= $minScore;

            if ($passed) {
                $progress->is_completed = true;
                $progress->completed_at = now();
                $progress->save();

                return response()->json([
                    'success' => true,
                    'completed' => true,
                    'score' => $score,
                    'attempts' => $progress->attempts,
                    'message' => 'Quiz passed! 🎉'
                ]);
            } else {
                $progress->save();
                return response()->json([
                    'success' => true,
                    'completed' => false,
                    'score' => $score,
                    'attempts' => $progress->attempts,
                    'attempts_left' => $maxAttempts - $progress->attempts,
                    'message' => 'Quiz failed. Please try again.'
                ]);
            }
        }

        // Standard Video Completion
        UserModuleProgress::updateOrCreate(
            [
                'user_id' => $user->id,
                'training_module_id' => $moduleId,
            ],
            [
                'is_completed' => true,
                'completed_at' => now(),
            ]
        );

        return response()->json(['success' => true, 'completed' => true]);
    }
}
