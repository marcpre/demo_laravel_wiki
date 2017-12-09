<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoAssetOverviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptoAsset_overview', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asset_logo');	            
            $table->string('name');
            $table->string('symbol')->unique();
            $table->decimal('current_price', 40, 9);	            
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
        Schema::dropIfExists('cryptoAsset_overview');
    }
}
