<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatcheParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batche_participant', function (Blueprint $table) {
            $table->unsignedInteger('bid');
            $table->unsignedInteger('pid');
            $table->boolean('status')->default(true);
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('bid')->references('bid')->on('batches')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign('pid')->references('pid')->on('participants')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batche_participant');
    }
}
