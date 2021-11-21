<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionRolesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('permission_roles', function (Blueprint $table) {
            $table->unsignedInteger('rid');
            $table->foreign(['rid'], 'rid_fk_pr')->references(['rid'])->on('roles')->onDelete('no action');
            $table->unsignedInteger('permission_id');
            $table->foreign(['permission_id'], 'permission_id_fk_pr')->references(['id'])->on('permissions')->onDelete('no action');
        });
    }


    public function down()
    {
        Schema::dropIfExists('permission_roles');
    }
}
