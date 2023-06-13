<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('phone');
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['username' => 'aria', 'password' => Hash::make('aria'), 'name' => 'aria', 'phone' => 'aria']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}