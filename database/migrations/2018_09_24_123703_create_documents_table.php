<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('duedate');
            $table->integer('notifyBefore')->default(10);
            $table->integer('interval');
            $table->string('issuingCompany')->nullable();
            $table->string('amount')->nullable();
            $table->string('notes')->nullable();
            $table->integer('vehicleId')->unsigned();
            $table->foreign('vehicleId')->references('id')->on('vehicles');
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
        Schema::dropIfExists('documents');
    }
}
