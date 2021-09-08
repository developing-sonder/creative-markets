<?php

use App\Models\Seller;
use App\Models\OnlineStore;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_stores', function (Blueprint $table) {
            $table->id();
            $table->string('url',  2083);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('online_store_seller', function (Blueprint $table) {
            $table->foreignIdFor(OnlineStore::class);
            $table->foreignIdFor(Seller::class);
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
        Schema::dropIfExists('online_store_seller');
        Schema::dropIfExists('online_stores');
    }
}
