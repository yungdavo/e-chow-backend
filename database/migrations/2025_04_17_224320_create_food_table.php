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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_id')->constrained('food_categories')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->string('location');
            $table->integer('stars')->default(0);
            $table->integer('people')->nullable();
            $table->integer('selected_people')->nullable();
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
