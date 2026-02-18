<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('business_wifi_orders', function (Blueprint $table) {
            if (Schema::hasColumn('business_wifi_orders', 'name')) {
                $table->dropColumn('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_wifi_orders', function (Blueprint $table) {
            $table->string('name')->nullable();
        });
    }
};
