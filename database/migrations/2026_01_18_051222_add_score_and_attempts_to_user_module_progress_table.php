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
        Schema::table('user_module_progress', function (Blueprint $table) {
            if (!Schema::hasColumn('user_module_progress', 'score')) {
                $table->integer('score')->default(0)->after('status');
            }
            if (!Schema::hasColumn('user_module_progress', 'attempts')) {
                $table->integer('attempts')->default(0)->after('score');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_module_progress', function (Blueprint $table) {
            //
        });
    }
};
