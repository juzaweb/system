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
            $table->string('type', 100)->index();
            $table->string('taxonomy', 100)->index();
            $table->string('slug', 100)->index();
            $table->bigInteger('parent_id')->nullable()->index();
            $table->bigInteger('count')->default(0);
            $table->bigInteger('created_by')->nullable()->index();
            $table->bigInteger('updated_by')->nullable()->index();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('taxonomies');
    }
}
