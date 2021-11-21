<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRoleuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_users', function (Blueprint $table) {
            $table->foreign(['rid'], 'fk_rol_rol_usr')->references(['rid'])->on('roles')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['uid'], 'fk_usr_rol_usr')->references(['uid'])->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_users', function (Blueprint $table) {
            $table->dropForeign('fk_rol_rol_usr');
            $table->dropForeign('fk_usr_rol_usr');
        });
    }
}
