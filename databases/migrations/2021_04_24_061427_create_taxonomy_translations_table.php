<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxonomyTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('taxonomy_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('taxonomy_id');
            $table->string('locale', 5)->index();
            $table->string('name', 200);
            $table->string('thumbnail', 150)->nullable();
            $table->text('description')->nullable();

            $table->unique(['taxonomy_id', 'locale']);
            $table->foreign('taxonomy_id')
                ->references('id')
                ->on('taxonomies')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('taxonomy_translations');
    }
}
