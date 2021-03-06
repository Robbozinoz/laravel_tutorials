<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Used unsignedbigInteger to ensute match with user table is "type"
            $table->unsignedBigInteger('owner_id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('projects', function (Blueprint $table) {
            //Adding database reference for owenr table used to link to database table for users
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
