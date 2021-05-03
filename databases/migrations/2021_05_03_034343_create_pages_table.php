<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePagesTable.
 */
class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status', 50)->index()->default('draft');
            $table->string('template', 100)->index()->nullable();
            $table->integer('comment_count')->default(0);
            $table->bigInteger('created_by')->index();
            $table->bigInteger('updated_by')->index();
            $table->timestamps();
        });

        Schema::create('page_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id');
            $table->string('locale', 5)->index();
            $table->string('name');
            $table->longText('content')->nullable();
            $table->string('thumbnail', 150)->nullable();

            $table->unique(['page_id', 'locale']);
            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_translations');
        Schema::dropIfExists('pages');
    }
}
