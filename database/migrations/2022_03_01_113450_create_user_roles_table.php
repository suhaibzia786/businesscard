<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role');
            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->unsignedBigInteger('role_id');
        //     $table->foreign('role_id')->references('role_id')->on('user_roles');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_roles');
    }
}