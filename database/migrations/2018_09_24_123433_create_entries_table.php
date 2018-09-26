<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dateFrom');
            $table->string('dateTo');
            $table->integer('vehicleId')->unsigned();
            $table->foreign('vehicleId')->references('id')->on('vehicles');
            $table->integer('customerId')->unsigned();
            $table->foreign('customerId')->references('id')->on('customers');
            $table->string('startKm')->nullable();
            $table->string('endKm')->nullable();
            $table->string('total')->nullable();
            $table->string('locationFrom')->nullable();
            $table->string('locationTo')->nullable();
            $table->string('loadType')->nullable();
            $table->string('ton')->nullable();
            $table->string('billAmount')->nullable();
            $table->string('advance')->nullable();
            $table->string('comission')->nullable();
            $table->string('loadingMamool')->nullable();
            $table->string('unLoadingMamool')->nullable();
            $table->bigInteger('balance')->nullable();
            $table->integer('clientid')->unsigned();
            $table->foreign('clientid')->references('id')->on('clients');
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
        Schema::dropIfExists('entries');
    }
}
