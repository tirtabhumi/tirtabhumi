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
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('institution');
            $table->string('payment_status')->default('unpaid')->after('payment_method');
            $table->string('transaction_id')->nullable()->after('payment_status');
            $table->decimal('admin_fee', 12, 0)->default(0)->after('transaction_id');
            $table->decimal('total_amount', 12, 0)->nullable()->after('admin_fee');
            $table->timestamp('payment_expiry_time')->nullable()->after('total_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'payment_status', 'transaction_id', 'admin_fee', 'total_amount', 'payment_expiry_time']);
        });
    }
};
