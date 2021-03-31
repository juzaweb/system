<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxonomiesTable extends Migration
{
    public function up()
    {
        Schema::create('taxonomies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('thumbnail', 150)->index()->nullable();
            $table->text('description')->nullable();
            $table->string('taxonomy', 50)->index();
            $table->bigInteger('parent_id')->nullable()->index();
            $table->bigInteger('count')->default(0);
            $table->bigInteger('created_by')->index();
            $table->bigInteger('updated_by')->index();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('taxonomies');
    }
}
