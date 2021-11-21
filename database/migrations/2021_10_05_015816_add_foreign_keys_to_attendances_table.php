<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign(['bid'], 'fk_bat_att')->references(['bid'])->on('batches')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['pid'], 'fk_pax_att')->references(['pid'])->on('participants')->onUpdate('CASCADE')->onDelete('CASCADE ');
            $table->foreign('created_by')->references('uid')->on('users');
            $table->foreign('updated_by')->references('uid')->on('users');
            $table->foreign('deleted_by')->references('uid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign('fk_bat_att');
            $table->dropForeign('fk_pax_att');
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
        });
    }
}
