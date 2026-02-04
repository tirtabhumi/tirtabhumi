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
        // First add the new column
        if (!Schema::hasColumn('posts', 'images')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->json('images')->nullable()->after('image');
            });
        }

        // Migrate existing data
        DB::table('posts')->whereNotNull('image')->orderBy('id')->each(function ($post) {
            $images = [$post->image];
            DB::table('posts')
                ->where('id', $post->id)
                ->update(['images' => json_encode($images)]);
        });

        // Drop old column
        if (Schema::hasColumn('posts', 'image')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasColumn('posts', 'image')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->string('image')->nullable()->after('images');
            });
        }

        DB::table('posts')->whereNotNull('images')->orderBy('id')->each(function ($post) {
            $images = json_decode($post->images, true);
            if (!empty($images) && is_array($images)) {
                DB::table('posts')
                    ->where('id', $post->id)
                    ->update(['image' => $images[0]]);
            }
        });

        if (Schema::hasColumn('posts', 'images')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('images');
            });
        }
    }
};
