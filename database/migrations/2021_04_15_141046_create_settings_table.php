<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('facebook')->default('#');
            $table->string('twitter')->default('#');
            $table->string('linkedin')->default('#');
            $table->string('instagram')->default('#');
            $table->string('logo')->nullable();
            $table->string('image_main')->nullable();
            $table->string('background_main')->nullable();
            $table->string('background_nav')->nullable();
            $table->string('background_footer')->nullable();
            $table->string('card_color')->nullable();
            $table->string('card_com_pos_nav')->nullable();
            $table->string('card_com_pos_body')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
