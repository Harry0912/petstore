<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('type_id');
            $table->string('product_name');
            $table->string('product_intro');
            $table->text('product_content');
            $table->enum('on_sale', ['Y', 'N']);
            $table->integer('product_price');
            $table->integer('product_sale');
            $table->string('product_image');
            $table->dateTime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
