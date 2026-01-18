<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Registration;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::where('is_active', true)
            ->where(function ($q) {
                $q->where('event_date', '>=', now())
                    ->orWhereNull('event_date');
            })
            ->orderByRaw('event_date IS NULL DESC, event_date ASC')
            ->take(15)
            ->get();

        return view('trainings.index', compact('trainings'));
    }




    public function list(Request $request)
    {
        // Referral code is now handled by SaveReferralCode global middleware

        $query = Training::where('is_active', true)
            ->where(function ($q) {
                $q->where('event_date', '>=', now())
                    ->orWhereNull('event_date');
            });

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter Category
        if ($request->filled('category')) {
            $query->whereIn('category', (array) $request->category);
        }

        // Filter Level
        if ($request->filled('level')) {
            $query->whereIn('level', (array) $request->level);
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

        $title = 'UpVenture Learnings';

        $filters = [
            'category' => ['class', 'webinar', 'workshop'],
            'level' => ['beginner', 'intermediate', 'advanced'],
            'type' => ['online', 'offline', 'hybrid'],
        ];

        return view('trainings.list', compact('trainings', 'title', 'filters'));
    }

    public function show(Training $training, Request $request)
    {
        if (!$training->is_active) {
            abort(404);
        }

        // Referral code is now handled by SaveReferralCode global middleware

        $isRegistered = false;
        if (auth()->check()) {
            $isRegistered = Registration::where('email', auth()->user()->email)
                ->where('training_id', $training->id)
                ->where('status', 'completed')
                ->exists();
        }

        return view('trainings.show', [
            'training' => $training->load('modules'),
            'isRegistered' => $isRegistered
        ]);
    }

    public function register(Request $request, Training $training)
    {
        if ($training->event_date && $training->event_date->isPast()) {
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
