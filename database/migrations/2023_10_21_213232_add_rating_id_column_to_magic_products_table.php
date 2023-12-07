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
        Schema::table('magic_products', function (Blueprint $table) {
            $table->unsignedTinyInteger('rating_id');
            $table->foreign('rating_id')->references('rating_id')->on('ratings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('magic_products', function (Blueprint $table) {
            $table->dropColumn('rating_id');
        });
    }
};
