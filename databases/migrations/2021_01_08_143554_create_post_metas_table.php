<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostMetasTable extends Migration
{
    public function up()
    {
        Schema::create('post_metas', function (Blueprint $table) {
            $table->bigInteger('post_id')->index();
            $table->string('meta_key', 150)->index();
            $table->text('meta_value')->nullable();
            $table->unique(['post_id', 'meta_key']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('post_metas');
    }
}
