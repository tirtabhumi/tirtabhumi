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
            // Drop old status column and add new one with correct enum values
            $table->dropColumn('status');
        });

        Schema::table('affiliates', function (Blueprint $table) {
            // Add affiliate code
            $table->string('affiliate_code')->unique()->after('user_id');

            // Add KTP fields
            $table->string('ktp_name')->after('affiliate_code');
            $table->string('ktp_photo')->after('ktp_name');

            // Add bank account fields
            $table->string('bank_account_name')->after('ktp_photo');
            $table->string('bank_name')->after('bank_account_name');
            $table->string('bank_account_number')->after('bank_name');
            $table->string('bank_book_photo')->after('bank_account_number');

            // Add status with correct enum values
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('bank_book_photo');
            $table->text('rejection_reason')->nullable()->after('status');

            // Rename balance to total_earnings and add other earnings fields
            $table->renameColumn('balance', 'total_earnings');
        });

        Schema::table('affiliates', function (Blueprint $table) {
            // Add withdrawn and pending earnings
            $table->decimal('withdrawn_earnings', 15, 2)->default(0)->after('total_earnings');
            $table->decimal('pending_earnings', 15, 2)->default(0)->after('withdrawn_earnings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->dropColumn([
                'affiliate_code',
                'ktp_name',
                'ktp_photo',
                'bank_account_name',
                'bank_name',
                'bank_account_number',
                'bank_book_photo',
                'rejection_reason',
                'withdrawn_earnings',
                'pending_earnings'
            ]);

            $table->renameColumn('total_earnings', 'balance');
            $table->dropColumn('status');
        });

        Schema::table('affiliates', function (Blueprint $table) {
            $table->string('status')->default('active');
        });
    }
};
