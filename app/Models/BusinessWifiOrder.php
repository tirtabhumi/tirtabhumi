<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessWifiOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ktp_name',
        'phone',
        'ktp_photo_path',
        'company_name',
        'business_field',
        'npwp',
        'npwp_doc_path',
        'nib_doc_path',
        'address',
        'latitude',
        'longitude',
        'business_photo_path',
        'package_name',
        'status',
    ];
}
