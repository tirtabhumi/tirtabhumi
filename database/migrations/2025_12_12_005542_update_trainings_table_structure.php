<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            if (!Schema::hasColumn('trainings', 'location_offline')) {
                $table->string('location_offline')->nullable()->after('location');
            }
            if (!Schema::hasColumn('trainings', 'location_online')) {
                $table->string('location_online')->nullable()->after('location_offline');
            }
        });

        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE trainings MODIFY COLUMN type ENUM('online', 'offline', 'hybrid')");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            if (Schema::hasColumn('trainings', 'location_offline')) {
                $table->dropColumn('location_offline');
            }
            if (Schema::hasColumn('trainings', 'location_online')) {
                $table->dropColumn('location_online');
            }
        });
        
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE trainings MODIFY COLUMN type ENUM('online', 'offline')");
        }
    }
};
