<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            // unique: moi san pham chi co 1 ma san pham
            $table->string('product_code',50)->unique();
            $table->string('name');
            $table->decimal('price', 18, 0)->default(0);
            // unsigned: dang khong dau
            // tinyInteger: So nguyen nho nhat
            $table->tinyInteger('featured')->unsigned();
            $table->tinyInteger('state')->unsigned();
            $table->text('info')->nullable();
            $table->text('describe')->nullable();
            $table->string('img');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}
