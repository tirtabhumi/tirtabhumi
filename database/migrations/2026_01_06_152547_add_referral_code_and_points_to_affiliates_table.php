<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            // Add referral code (5 characters, unique)
            $table->string('referral_code', 5)->unique()->nullable()->after('affiliate_code');

            // Add points system (1000 points = Rp 1000)
            $table->decimal('total_points', 15, 2)->default(0)->after('pending_earnings');
            $table->decimal('withdrawn_points', 15, 2)->default(0)->after('total_points');
            $table->decimal('pending_points', 15, 2)->default(0)->after('withdrawn_points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->dropColumn([
                'referral_code',
                'total_points',
                'withdrawn_points',
                'pending_points'
            ]);
        });
    }
};
