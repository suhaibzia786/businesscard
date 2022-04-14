<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slogan')->nullable();
            $table->string('email');
            $table->string('password');
            $table->integer('role_id');
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('slug')->nullable();
            $table->string('logo')->nullable();
            $table->string('color')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('companies');
    }
}