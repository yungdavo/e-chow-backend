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
        Schema::table('products', function (Blueprint $table) {
            
            //$table->decimal('price', 8, 2)->after('name');
            //$table->integer('stars')->after('price');
            //$table->text('description')->nullable()->after('stars');
            $table->string('image')->nullable()->after('description');
            //$table->foreignId('product_category_id')->constrained()->after('image');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['name', 'price', 'stars', 'description', 'image', 'product_category_id']);
    });
    }
};
