<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up(): void
    {
        Schema::table('business_wifi_orders', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('ktp_name');
            $table->string('ktp_photo_path')->nullable()->after('phone');
            $table->string('npwp_doc_path')->nullable()->after('npwp');
            $table->text('address')->nullable()->after('npwp_doc_path');
        });
    }

    public function down(): void
    {
        Schema::table('business_wifi_orders', function (Blueprint $table) {
            $table->dropColumn(['phone', 'ktp_photo_path', 'npwp_doc_path', 'address']);
        });
    }
};
