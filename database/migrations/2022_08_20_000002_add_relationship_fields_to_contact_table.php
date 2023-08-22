<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContactTable extends Migration
{
    public function up()
    {
        Schema::table('contact', function (Blueprint $table) {
            $table->unsignedInteger('venue_id');

            $table->foreign('venue_id', 'venue_fk_08202022')->references('id')->on('venues')->onDelete('cascade');
        });
    }
}
