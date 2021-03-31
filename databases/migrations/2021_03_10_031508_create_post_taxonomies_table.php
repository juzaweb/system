<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTaxonomiesTable extends Migration
{
    public function up()
    {
        Schema::create('post_taxonomies', function (Blueprint $table) {
            $table->bigInteger('post_id')->index();
            $table->bigInteger('taxonomy_id')->index();
            $table->string('post_type', 50)->index();
            $table->primary(['post_id', 'taxonomy_id', 'post_type']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('post_taxonomies');
    }
}
