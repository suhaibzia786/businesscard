<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('interval')->nullable()->comment('per month or per year');
            $table->integer('featured')->nullable()->comment('1 for yes, 0 for no');
            $table->integer('icon')->nullable();
            $table->integer('no_of_cards')->nullable();
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
        Schema::dropIfExists('packages');
    }
}