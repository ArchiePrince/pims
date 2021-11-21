<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('pid');
            $table->string('rec_id')->nullable();
            $table->string('f_name');
            $table->string('l_name');
            $table->enum('gender', ['male', 'female']);
            $table->string('p_email');
            $table->string('prfssn');
            $table->string('org');
            $table->string('distr');
            $table->string('rgn');
            $table->string('tel');
            $table->string('phone')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
