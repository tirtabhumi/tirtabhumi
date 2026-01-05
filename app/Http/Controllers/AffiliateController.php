<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\AffiliateLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AffiliateController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->isAffiliate()) {
            return view('affiliate.intro');
        }

        $affiliate = $user->affiliate;
        
        // Ensure affiliate record exists (integrity check)
        if (!$affiliate) {
             // Create if missing logic (should be handled in join, but safety net)
             $affiliate = Affiliate::create(['user_id' => $user->id]);
        }

        return view('affiliate.dashboard', compact('affiliate'));
    }

    public function join()
    {
        $user = Auth::user();

        if ($user->isAffiliate()) {
            return redirect()->route('affiliate.index');
        }

        $user->update(['role' => 'affiliate']);
        Affiliate::create(['user_id' => $user->id]);

        return redirect()->route('affiliate.index')->with('success', 'Welcome to the Affiliate Program!');
    }

    public function generateLink(Request $request) 
    {
        $request->validate([
            'item_type' => 'required',
            'item_id' => 'required',
        ]);

        $affiliate = Auth::user()->affiliate;

        $link = AffiliateLink::firstOrCreate(
            [
                'affiliate_id' => $affiliate->id,
                'item_type' => $request->item_type,
                'item_id' => $request->item_id,
            ],
            [
                'code' => Str::random(8),
            ]
        );

        return back()->with('success', 'Link generated successfully!');
    }
}
