<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEventsTable extends Migration
{

    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('created_by')->references('uid')->on('users');
            $table->foreign('updated_by')->references('uid')->on('users');
            $table->foreign('deleted_by')->references('uid')->on('users');

        });
    }


    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
    }
}
