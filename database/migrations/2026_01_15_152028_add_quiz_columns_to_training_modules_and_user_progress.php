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
        Schema::table('training_modules', function (Blueprint $table) {
            $table->integer('min_score')->default(70)->after('questions');
            $table->integer('max_attempts')->default(3)->after('min_score');
        });

        Schema::table('user_module_progress', function (Blueprint $table) {
            $table->integer('score')->nullable()->after('is_completed');
            $table->integer('attempts')->default(0)->after('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_modules', function (Blueprint $table) {
            $table->dropColumn(['min_score', 'max_attempts']);
        });

        Schema::table('user_module_progress', function (Blueprint $table) {
            $table->dropColumn(['score', 'attempts']);
        });
    }
};
