<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeConfigsTable extends Migration
{
    public function up()
    {
        Schema::create('theme_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('theme', 150)->unique()->index();
            $table->longText('data')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('theme_configs');
    }
}
