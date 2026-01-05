<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\TrainingModule;
use App\Models\UserModuleProgress;
use Illuminate\Http\Request;

class MyWebinarController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        // Get all completed/paid registrations for webinars only
        $query = Registration::with(['training.modules'])
            ->where('email', $user->email)
            ->where('status', 'completed')
            ->whereHas('training', function ($q) {
                $q->where('category', 'webinar');
            });

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('training', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by type (online/offline/hybrid)
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

        $myWebinars = $query->paginate(12);

        return view('my-webinars.index', compact('myWebinars'));
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

        return view('my-webinars.show', compact('training', 'userProgress', 'progressPercentage'));
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
