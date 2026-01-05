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

    public function show(Training $training)
    {
        if (!$training->is_active) {
            abort(404);
        }

        return view('trainings.show', compact('training'));
    }

    public function register(Request $request, Training $training)
    {
        if ($training->event_date->isPast()) {
            return back()->with('error', 'Pendaftaran sudah ditutup karena waktu pelatihan sudah berlalu.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'institution' => 'nullable|string|max:255',
        ]);

        $training->registrations()->create($validated);

        return back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
    }
}
