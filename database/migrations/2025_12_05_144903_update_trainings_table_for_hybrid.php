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
            $table->renameColumn('location', 'location_offline');
        });

        Schema::table('trainings', function (Blueprint $table) {
            $table->string('location_online')->nullable()->after('location_offline');
            // We need to change the enum type. Since Doctrine DBAL doesn't support changing enum values easily,
            // we can change it to string first or use raw SQL.
            // For simplicity and compatibility, let's change it to string to support 'hybrid'.
            // If strict enum is needed, we would need a raw statement to alter the type.
            $table->string('type')->change(); 
        });

        // Migrate existing data
        // If type is online, move location_offline content to location_online
        DB::table('trainings')->where('type', 'online')->update([
            'location_online' => DB::raw('location_offline'),
            'location_offline' => null,
        ]);
    }

    public function down(): void
    {
        // Reverse data migration
        DB::table('trainings')->where('type', 'online')->update([
            'location_offline' => DB::raw('location_online'),
        ]);

        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('location_online');
            $table->renameColumn('location_offline', 'location');
            // Revert type to enum - this might be tricky if 'hybrid' data exists.
            // We'll just change it back to string for now or enum if we are sure no hybrid exists.
            // For safety in down, we can leave it as string or attempt to revert if empty.
            // Let's just revert the column name and drop the new one.
        });
        
        // Revert type to enum (optional, but good for consistency if possible)
        // Schema::table('trainings', function (Blueprint $table) {
        //    $table->enum('type', ['online', 'offline'])->change();
        // });
    }
};
