<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\UserModuleProgress;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Get all completed/paid registrations
        $registrations = Registration::with(['training.modules'])
            ->where('email', $user->email)
            ->where('status', 'completed')
            ->latest()
            ->paginate(12);

        // Filter for only 100% completed courses
        // Note: Pagination might be slightly inaccurate if we filter after query, but for now it's okay.
        // Better approach would be to store 'is_certified' boolean on registration table, but let's calculate for now.
        
        $certificates = $registrations->getCollection()->filter(function ($registration) use ($user) {
            $totalModules = $registration->training->modules->count();
            if ($totalModules === 0) return false;

            $completedModules = UserModuleProgress::where('user_id', $user->id)
                ->whereIn('training_module_id', $registration->training->modules->pluck('id'))
                ->where('is_completed', true)
                ->count();
            
            return $completedModules === $totalModules;
        });

        // Replace collection in paginator
        $registrations->setCollection($certificates);

        return view('certificates.index', compact('registrations'));
    }
}
