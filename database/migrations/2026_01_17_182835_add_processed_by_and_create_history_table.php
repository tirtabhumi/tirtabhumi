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
        Schema::table('withdrawal_requests', function (Blueprint $table) {
            $table->foreignId('processed_by')->nullable()->constrained('users')->nullOnDelete();
        });

        Schema::create('withdrawal_request_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('withdrawal_request_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action'); // created, approved, rejected, updated
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawal_request_histories');
        
        Schema::table('withdrawal_requests', function (Blueprint $table) {
            $table->dropForeign(['processed_by']);
            $table->dropColumn('processed_by');
        });
    }
};
