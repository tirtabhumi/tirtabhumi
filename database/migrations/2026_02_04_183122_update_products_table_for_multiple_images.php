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
        if (!Schema::hasColumn('products', 'images')) {
            Schema::table('products', function (Blueprint $table) {
                $table->json('images')->nullable()->after('image');
            });
        }

        // Migrate existing data
        DB::table('products')->whereNotNull('image')->orderBy('id')->each(function ($product) {
            $images = [$product->image];
            DB::table('products')
                ->where('id', $product->id)
                ->update(['images' => json_encode($images)]);
        });

        // Drop old column
        if (Schema::hasColumn('products', 'image')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->nullable()->after('images');
        });

        DB::table('products')->whereNotNull('images')->each(function ($product) {
            $images = json_decode($product->images, true);
            if (!empty($images) && is_array($images)) {
                DB::table('products')
                    ->where('id', $product->id)
                    ->update(['image' => $images[0]]);
            }
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }
};
