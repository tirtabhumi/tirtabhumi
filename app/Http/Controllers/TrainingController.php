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
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        return view('trainings.index', compact('trainings'));
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
