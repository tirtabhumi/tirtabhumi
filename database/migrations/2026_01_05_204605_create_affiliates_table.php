<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('affiliate_code')->unique();
            $table->string('ktp_name');
            $table->string('ktp_photo');
            $table->string('bank_account_name');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bank_book_photo');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->decimal('total_earnings', 15, 2)->default(0);
            $table->decimal('withdrawn_earnings', 15, 2)->default(0);
            $table->decimal('pending_earnings', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('affiliate_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_id')->constrained()->onDelete('cascade');
            $table->foreignId('registration_id')->constrained()->onDelete('cascade');
            $table->decimal('commission_amount', 15, 2);
            $table->decimal('commission_percentage', 5, 2)->default(5.00);
            $table->enum('status', ['pending', 'approved', 'paid'])->default('pending');
            $table->timestamps();
        });

        Schema::create('affiliate_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 15, 2);
            $table->decimal('tax_amount', 15, 2); // PPN 11%
            $table->decimal('platform_fee', 15, 2); // 5%
            $table->decimal('net_amount', 15, 2); // Amount after deductions
            $table->enum('status', ['requested', 'processing', 'completed', 'rejected'])->default('requested');
            $table->text('notes')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('affiliate_withdrawals');
        Schema::dropIfExists('affiliate_sales');
        Schema::dropIfExists('affiliates');
    }
};
