<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventTypesTable extends Migration
{
    public function up()
    {
        Schema::table('event_types', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_fk_20220824')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
