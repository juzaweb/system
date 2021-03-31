<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 5)->unique();
            $table->string('name', 250);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
