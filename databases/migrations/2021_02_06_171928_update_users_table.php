<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('email', 150)->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar', 150)->nullable();
            $table->string('verification_token', 100)->nullable();
            $table->string('status', 50)->index()->default('active');
            $table->boolean('is_admin')->default(0)->index();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
