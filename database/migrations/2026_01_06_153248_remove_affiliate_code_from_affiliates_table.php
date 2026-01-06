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
        // Check if column exists before dropping
        if (Schema::hasColumn('affiliates', 'affiliate_code')) {
            Schema::table('affiliates', function (Blueprint $table) {
                // Drop unique index first to support SQLite
                $table->dropUnique(['affiliate_code']);
                $table->dropColumn('affiliate_code');
            });
        }

        Schema::table('affiliates', function (Blueprint $table) {
            // Make referral_code not nullable
            $table->string('referral_code', 5)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            // Add back affiliate_code
            $table->string('affiliate_code')->unique()->after('user_id');

            // Make referral_code nullable again
            $table->string('referral_code', 5)->nullable()->change();
        });
    }
};
