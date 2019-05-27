<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt', function (Blueprint $table) {
            $table->bigIncrements('receiptID');
            $table->string('sn',30)->nullable();
            $table->bigInteger('supplierID')->unsigned()->index();
            $table->foreign('supplierID')->references('supplierID')->on('supplier')->onDelete('No Action')->onUpdate('No Action');
            $table->double('discount')->default(0);
            $table->double('otherCost')->default(0);
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
        Schema::dropIfExists('receipt');
    }
}
