<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up(): void
    {
        Schema::table('business_wifi_orders', function (Blueprint $table) {
            $table->string('nib_doc_path')->nullable()->after('npwp_doc_path');
        });
    }

    public function down(): void
    {
        Schema::table('business_wifi_orders', function (Blueprint $table) {
            $table->dropColumn('nib_doc_path');
        });
    }
};
