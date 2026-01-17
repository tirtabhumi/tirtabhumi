<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //
    protected $fillable = [
        'name',
        'pks',
        'nib',
        'npwp',
        'pic_name',
        'pic_phone',
        'address',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
    ];
}
