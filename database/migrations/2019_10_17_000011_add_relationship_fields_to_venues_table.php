<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVenuesTable extends Migration
{
    public function up()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->unsignedInteger('location_id');

            $table->foreign('location_id', 'location_fk_480175')->references('id')->on('locations')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'venue_fk_08262022')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
