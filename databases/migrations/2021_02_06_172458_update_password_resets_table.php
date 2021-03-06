<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePasswordResetsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('password_resets')) {
            Schema::create('password_resets', function (Blueprint $table) {
                $table->string('email', 150)->index();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }
    }
    
    public function down()
    {
        //
    }
}
