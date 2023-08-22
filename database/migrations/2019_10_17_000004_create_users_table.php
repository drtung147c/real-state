<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('phone');

            $table->string('bod');

            $table->integer('is_super_admin');

            $table->string('address')->nullable();

            $table->string('job')->nullable();

            $table->string('email')->unique();

            $table->datetime('email_verified_at')->nullable();

            $table->string('password');

            $table->string('remember_token')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
