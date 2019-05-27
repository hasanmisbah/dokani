<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('productID');
            $table->string('name',160);
            $table->string('sku',30)->nullable();
            $table->string('category',100)->nullable();
            $table->string('description')->nullable();
            $table->string('units',10)->default('pcs');
            $table->double('price')->default(0);//Sales Price
            $table->double('buy_price')->default(0);//Purchase Price
            $table->double('stock')->default(0);
            $table->integer('limits')->default(0);
            $table->softDeletes();
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
