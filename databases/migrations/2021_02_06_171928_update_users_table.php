<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar', 150)->nullable();
            $table->string('verification_token', 100)->nullable();
            $table->string('status', 50)->index()->default('active');
            $table->boolean('is_admin')->default(0)->index();
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'avatar',
                'verification_token',
                'status',
                'is_admin',
            ]);
        });
    }
}
