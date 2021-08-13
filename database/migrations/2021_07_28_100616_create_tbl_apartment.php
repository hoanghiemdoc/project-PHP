<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblApartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_apartment', function (Blueprint $table) {
            $table->Increments('apartment_id');
            $table->integer('category_id');
            $table->integer('building_id');
            $table->string('apartment_name');
            $table->string('apartment_address');
            $table->string('apartment_price');
            $table->text('apartment_content');
            $table->text('apartment_desc');
            $table->string('apartment_image');
            $table->integer('apartment_status');
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
        Schema::dropIfExists('tbl_apartment');
    }
}
