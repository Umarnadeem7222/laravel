<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hclasses', function (Blueprint $table) {
            $table->integer("id");
            $table->string("Name");
            $table->string("TName");
            $table->integer("MaxStu");
            $table->integer("S_ID");
            $table->integer("T_ID");
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
        Schema::dropIfExists('hclasses');
    }
}
