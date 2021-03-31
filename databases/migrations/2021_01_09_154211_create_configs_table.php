<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->string('config_key', 150)->primary();
            $table->string('config_value')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
