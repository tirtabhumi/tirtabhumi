<?php

namespace App\Http\Controllers;

use App\Models\BusinessWifiOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessWifiController extends Controller
{
    public function index()
    {
        return view('tirtanet_bisnis');
    }

    public function register()
    {
        $package = request()->query('package', 'Broadband 100 Mbps');
        return view('wifibisnis_form', compact('package'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ktp_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'business_field' => 'required|string|max:255',
            'npwp' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'ktp_photo' => 'required|mimes:jpg,jpeg,png,webp|max:10240',
            'npwp_doc' => 'required|mimes:jpg,jpeg,png,pdf|max:10240',
            'nib_doc' => 'nullable|mimes:jpg,jpeg,png,pdf|max:10240',
            'business_photo' => 'required|mimes:jpg,jpeg,png,webp|max:10240',
            'package_name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('ktp_photo')) {
            $validated['ktp_photo_path'] = $request->file('ktp_photo')->store('business-wifi-photos/ktp', 'public');
        }
        if ($request->hasFile('npwp_doc')) {
            $validated['npwp_doc_path'] = $request->file('npwp_doc')->store('business-wifi-photos/npwp', 'public');
        }
        if ($request->hasFile('nib_doc')) {
            $validated['nib_doc_path'] = $request->file('nib_doc')->store('business-wifi-photos/nib', 'public');
        }
        if ($request->hasFile('business_photo')) {
            $validated['business_photo_path'] = $request->file('business_photo')->store('business-wifi-photos/bisnis', 'public');
        }

        BusinessWifiOrder::create($validated);

        return redirect()->route('wifi.bisnis')->with('success', 'Pendaftaran berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
