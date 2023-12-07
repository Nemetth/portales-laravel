<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('magic_products', function (Blueprint $table) {
            $table->id('magic_id');
            $table->string('name', 100);
            $table->unsignedInteger('price');
            $table->text('description');
            $table->string('category');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portales');
    }
};
