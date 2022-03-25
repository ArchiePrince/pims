<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEventTypesTable extends Migration
{

    public function up()
    {
        Schema::table('event_types', function (Blueprint $table) {
            $table->foreign(['eid'])->references(['eid'])->on('events')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }


    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['eid']);
        });
    }
}





























