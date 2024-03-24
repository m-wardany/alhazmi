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
        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->text('about');
            $table->text('vesion');
            $table->text('message');
            $table->string('value_professional');
            $table->string('value_innovation');
            $table->string('value_quality');
            $table->string('duty_customer');
            $table->string('duty_products');
            $table->string('duty_markets');
            $table->string('goals_1_title');
            $table->string('goals_1_body');
            $table->string('goals_2_title');
            $table->string('goals_2_body');
            $table->string('goals_3_title');
            $table->string('goals_3_body');
            $table->string('goals_4_title');
            $table->string('goals_4_body');
            $table->string('goals_5_title');
            $table->string('goals_5_body');
            $table->string('goals_6_title');
            $table->string('goals_6_body');
            $table->string('goals_7_title');
            $table->string('goals_7_body');
            $table->string('goals_8_title');
            $table->string('goals_8_body');
            $table->text('team');
            $table->text('responsibilities');
            $table->text('integrity');
            // $table->json('contact_fax');
            // $table->json('contact_phone');
            // $table->json('contact_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
