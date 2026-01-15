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
        Schema::table('trainings', function (Blueprint $table) {
            // Change enum to string to allow 'workshop' and other future categories
            // This requires doctrine/dbal which is installed
            $table->string('category')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            // Revert back to enum if needed, but might lose data if 'workshop' exists
            // For now, we can try to revert to enum including workshop or just previous state
            // It's safer to not strictly revert to restrictive enum if data exists
            // But strict down would be:
            // $table->enum('category', ['webinar', 'class'])->change();
        });
    }
};
