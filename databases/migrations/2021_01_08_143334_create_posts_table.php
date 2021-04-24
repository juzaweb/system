<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 20)->index()->default('post');
            $table->string('status', 50)->index()->default('draft');
            $table->integer('comment_count')->default(0);
            $table->bigInteger('created_by')->index();
            $table->bigInteger('updated_by')->index();
            $table->timestamps();
        });

        Schema::create('post_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->string('locale', 5)->index();
            $table->string('title', 250);
            $table->longText('content')->nullable();
            $table->string('thumbnail', 150)->nullable();
            $table->string('slug', 100)->index();

            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('post_translations');
        Schema::dropIfExists('posts');
    }
}
