<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Registration;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $webinars = Training::where('is_active', true)
            ->where('category', 'webinar')
            ->orderBy('event_date', 'asc')
            ->take(6) // Get 6 to check if there are more than 3
            ->get();

        $classes = Training::where('is_active', true)
            ->where('category', 'class')
            ->orderBy('event_date', 'asc')
            ->take(6) // Get 6 to check if there are more than 3
            ->get();

        return view('trainings.index', compact('webinars', 'classes'));
    }

    public function webinars(Request $request)
    {
        $query = Training::where('is_active', true)
            ->where('category', 'webinar');

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter Type
        if ($request->filled('type')) {
            $query->whereIn('type', (array) $request->type);
        }



        // Sort
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default: // latest/upcoming
                $query->orderBy('event_date', 'asc');
                break;
        }

        $trainings = $query->paginate(9)->withQueryString();

        $title = 'Webinar & Workshop';

        // Dynamic filters for sidebar
        $filters = [
            'type' => ['online', 'offline'],
        ];

        return view('trainings.list', compact('trainings', 'title', 'filters'));
    }

    public function classes(Request $request)
    {
        $query = Training::where('is_active', true)
            ->where('category', 'class');

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }



        // Filter Level
        if ($request->filled('level')) {
            $query->whereIn('level', (array) $request->level);
        }

        // Sort
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default: // latest/upcoming
                $query->orderBy('event_date', 'asc');
                break;
        }

        $trainings = $query->paginate(9)->withQueryString();

        $title = 'Class Digital';

        $filters = [
            'level' => ['beginner', 'intermediate', 'advanced']
        ];

        return view('trainings.list', compact('trainings', 'title', 'filters'));
    }

    public function show(Training $training, Request $request)
    {
        if (!$training->is_active) {
            abort(404);
        }

        // Capture referral code from URL and store in session
        if ($request->has('ref')) {
            $referralCode = strtoupper($request->get('ref'));
            // Verify the referral code exists and is approved
            $affiliate = \App\Models\Affiliate::where('referral_code', $referralCode)
                ->where('status', 'approved')
                ->first();

            if ($affiliate) {
                session(['referral_code' => $referralCode]);
            }
        }

        return view('trainings.show', compact('training'));
    }

    public function register(Request $request, Training $training)
    {
        if ($training->event_date->isPast()) {
            return back()->with('error', 'Pendaftaran sudah ditutup karena waktu pelatihan sudah berlalu.');
        }

        if (\Illuminate\Support\Facades\Auth::check()) {
            $user = \Illuminate\Support\Facades\Auth::user();
            $validated = [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '-', // Fallback or handle missing phone
                'institution' => $request->input('institution'),
            ];
        } else {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'institution' => 'nullable|string|max:255',
            ]);
        }

        // Add referral code if exists in session
        if (session()->has('referral_code')) {
            $validated['referred_by'] = session('referral_code');
        }

        $registration = $training->registrations()->create($validated);

        // Clear referral code from session after use
        session()->forget('referral_code');

        return redirect()->route('payment.show', $registration);
    }
}
