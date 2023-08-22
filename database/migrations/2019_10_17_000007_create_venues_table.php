<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('slug');

            $table->string('address');

            $table->integer('priority');

            $table->boolean('status')->default(0);

            $table->float('area')->nullable();

            $table->float('construction')->nullable();

            $table->integer('floor')->nullable();

            $table->integer('room')->nullable();

            $table->integer('bath_room')->nullable();

            $table->string('direction')->nullable();

            $table->integer('book_status')->nullable();

            $table->integer('book_ownership_status')->nullable();

            $table->integer('house_status')->nullable();

            $table->integer('school_facility')->nullable();

            $table->integer('hospital_facility')->nullable();

            $table->integer('market_facility')->nullable();

            $table->integer('park_facility')->nullable();

            $table->integer('is_rent')->nullable();

            $table->integer('is_sold')->nullable();

            $table->float('latitude', 15, 8)->nullable();

            $table->float('longitude', 15, 8)->nullable();

            $table->longText('description')->nullable();

            $table->longText('features')->nullable();

            $table->decimal('price', 15, 2)->nullable();

            $table->boolean('is_featured')->default(0)->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
