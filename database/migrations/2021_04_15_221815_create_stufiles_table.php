<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStufilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stufiles', function (Blueprint $table) {
            $table->id();
            $table->String('Name');
            $table->String('OName');
            $table->String('TName');
            $table->String('CName');
            $table->String('comment');
            $table->integer('C_ID');
            $table->integer('T_ID');
            $table->integer('S_ID');
            $table->string('Ext');
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
        Schema::dropIfExists('stufiles');
    }
}
