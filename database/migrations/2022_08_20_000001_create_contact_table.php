<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');

            $table->string('contact_name');

            $table->string('contact_phone');

            $table->string('contact_address')->nullable();

            $table->string('contact_description')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
