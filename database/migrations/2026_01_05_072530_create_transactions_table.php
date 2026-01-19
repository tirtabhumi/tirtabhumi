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
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->string('item_type'); // Training, Webinar
                $table->unsignedBigInteger('item_id');
                $table->decimal('amount', 15, 2);
                $table->string('status')->default('pending'); // pending, paid, failed
                $table->string('affiliate_code')->nullable();
                $table->timestamps();

                $table->index(['item_type', 'item_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
