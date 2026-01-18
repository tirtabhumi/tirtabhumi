<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaveReferralCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('ref')) {
            $referralCode = strtoupper($request->get('ref'));
            // Verify if affiliate exists and is approved, then store in session
            // We use direct DB query for performance to avoid loading full model if possible, 
            // but Model is safer.
            $exists = \App\Models\Affiliate::where('referral_code', $referralCode)
                ->where('status', 'approved')
                ->exists();

            if ($exists) {
                // Store in session for 30 days (effectively 'forever' for this browser session)
                session(['referral_code' => $referralCode]);
            }
        }

        return $next($request);
    }
}
