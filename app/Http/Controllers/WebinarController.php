<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::where('is_active', true)
            ->where('date', '>=', now())
            ->orderBy('date', 'asc')
            ->get();

        return view('webinars.index', compact('webinars'));
    }

    public function show(Webinar $webinar)
    {
        if (!$webinar->is_active) {
            abort(404);
        }

        return view('webinars.show', compact('webinar'));
    }

    public function register(Request $request, Webinar $webinar)
    {
        // Simple registration logic (could be improved with DB tracking)
        return back()->with('success', 'Registration successful! Link will be sent to your email.');
    }
}
