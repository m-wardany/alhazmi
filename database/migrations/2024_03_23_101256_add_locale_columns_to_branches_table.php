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
        Schema::table('branches', function (Blueprint $table) {
            $table->renameColumn('name', 'ar_name');
            $table->string('en_name');
            $table->string('ar_address');
            $table->string('en_address');
            $table->string('phone_numbers')->nullable();
            $table->string('mobile_numbers')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->renameColumn('ar_name', 'name');
            $table->dropColumn('en_name');
            $table->dropColumn('ar_address');
            $table->dropColumn('en_address');
            $table->dropColumn('phone_numbers');
            $table->dropColumn('mobile_numbers');
        });
    }
};
