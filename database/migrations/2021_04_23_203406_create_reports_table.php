<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('equipmentBrand');
            $table->string('equipmentModel');
            $table->string('equipmentSN');
            $table->text('equipmentAccesories');
            $table->text('reportedFail');
            $table->text('solution');
            $table->decimal('diagnosticCost',19,4);
            $table->decimal('finalCost',19,4);
            $table->dateTime('entranceDate');
            $table->dateTime('exitDate');
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
        Schema::dropIfExists('reports');
    }
}
