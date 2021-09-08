<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string("first_name", 25);
            $table->string("last_name", 25);
            $table->string("shop_category", 50);
            $table->boolean('author_content_confirmation');
            $table->boolean('has_online_store');
            $table->string('perspective_on_quality', 80);
            $table->string('experience_level', 80);
            $table->string('understanding_of_business', 80);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
