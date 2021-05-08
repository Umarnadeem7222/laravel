<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFile1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file1s', function (Blueprint $table) {
            $table->id();
            $table->integer('C_ID');
            $table->integer('S_ID');
            $table->integer('T_ID');
            $table->String('Desc');
            $table->String('Name');
            $table->String('Path');
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
        Schema::dropIfExists('file1s');
    }
}
