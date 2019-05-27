<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_item', function (Blueprint $table) {
            $table->bigIncrements('receiptItemID');
            $table->bigInteger('receiptID')->unsigned()->index();
            $table->foreign('receiptID')->references('receiptID')->on('receipt')->onDelete('cascade')->onUpdate('No Action');
            $table->bigInteger('productID')->unsigned()->index();
            $table->foreign('productID')->references('productID')->on('product')->onDelete('No Action')->onUpdate('No Action');
            $table->double('price')->default(0);
            $table->double('qty')->default(0);
            $table->string('units',10)->default('pcs');
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
        Schema::dropIfExists('receipt_item');
    }
}
