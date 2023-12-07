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
        Schema::create('products_have_types', function (Blueprint $table) {
            $table->foreignId('magic_id')->constrained('magic_products', 'magic_id');

            $table->unsignedTinyInteger('types_id');
            $table->foreign('types_id')->references('types_id')->on('types');

            $table->primary(['magic_id', 'types_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_have_types');
    }
};
