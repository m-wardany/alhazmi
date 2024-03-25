<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // $table->unsignedInteger('sort')->nullable();
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->unsignedInteger('slider')->nullable();
            // $table->unsignedInteger('sort')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sort');
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('slider');
            $table->dropColumn('sort');
        });
    }
};
