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
        Schema::create('users_have_products', function (Blueprint $table) {
            $table->unsignedTinyInteger('purchase_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('magic_id')->constrained('magic_products', 'magic_id');
            $table->primary(['user_id', 'magic_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_have_products');
    }
};
