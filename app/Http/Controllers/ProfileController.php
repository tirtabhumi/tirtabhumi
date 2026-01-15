<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Notifications\SecurityVerificationNotification; // We might need to create this, or just use raw mail

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'institution' => ['nullable', 'string', 'max:255'], // Assuming we add this to users table or just ignore if not present
        ]);

        // If specific logic for institution is needed (e.g. updating latest registration), handle here.
        // For now, let's assume we might want to save it to the user model if the column exists.
        // Based on user schema, 'institution' is not in users table yet. 
        // We will just update name, email, phone for now.

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update Avatar with cropping (Base64 data handling).
     */
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'string'], // Expecting Base64 string from cropper
        ]);

        $user = Auth::user();
        $imageData = $request->input('avatar');

        // Remove "data:image/png;base64," header
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        $imageName = 'avatars/' . $user->id . '_' . time() . '.png';

        Storage::disk('public')->put($imageName, base64_decode($image));

        // Delete old avatar if exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->update(['avatar' => $imageName]);

        return response()->json(['success' => true, 'avatar_url' => Storage::url($imageName)]);
    }

    public function deleteAvatar()
    {
        $user = Auth::user();
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
            $user->update(['avatar' => null]);
        }
        return back()->with('status', 'avatar-deleted');
    }

    /**
     * Send an email verification link to allow password change.
     */
    public function sendPasswordChangeLink(Request $request)
    {
        $user = Auth::user();

        // Generate a temporary signed URL that expires in 30 minutes
        $url = URL::temporarySignedRoute(
            'profile.password.edit',
            now()->addMinutes(30),
            ['user' => $user->id]
        );

        // Send Notification/Mail
        // Using a simple raw mail for speed, or we can make a Notification class.
        // Let's use standard Mail facade for simplicity here.
        \Illuminate\Support\Facades\Mail::send([], [], function ($message) use ($user, $url) {
            $message->to($user->email)
                ->subject('Security Verification: Change Password Request')
                ->html("
                    <h2>Security Verification</h2>
                    <p>Hello {$user->name},</p>
                    <p>You requested to change your password. To ensure it's you, please click the link below to proceed:</p>
                    <a href='{$url}' style='display:inline-block;padding:10px 20px;background:#4f46e5;color:white;text-decoration:none;border-radius:5px;'>Change Password</a>
                    <p>This link expires in 30 minutes.</p>
                    <p>If you did not request this, please secure your account immediately.</p>
                ");
        });

        return back()->with('status', 'verification-link-sent');
    }

    /**
     * Show the password change form.
     * This route MUST be protected by 'signed' middleware.
     */
    public function editPassword(Request $request, User $user)
    {
        // Ensure the logged in user matches the signature user (prevent cross-user link usage)
        if ($request->user()->id !== $user->id) {
            abort(403);
        }

        return view('profile.password', ['user' => $user]);
    }

    /**
     * Update the password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('profile.edit')->with('status', 'password-updated');
    }
}
