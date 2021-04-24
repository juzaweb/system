<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->string('locale', 5)->index();
            $table->string('title', 250);
            $table->longText('content')->nullable();
            $table->string('thumbnail', 150)->nullable();
            $table->string('slug', 100)->index();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_translations');
    }
}
