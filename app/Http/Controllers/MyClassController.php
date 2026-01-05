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
                $q->where('category', 'class');
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

        return view('my-classes.index', compact('myClasses'));
    }

    public function show($trainingId)
    {
        $user = auth()->user();

        // Verify user has access (completed registration)
        $registration = Registration::where('email', $user->email)
            ->where('training_id', $trainingId)
            ->where('status', 'completed')
            ->firstOrFail();

        $training = $registration->training()->with('modules')->firstOrFail();

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

        // Mark as completed
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

        return response()->json(['success' => true]);
    }
}
