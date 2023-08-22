<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagNewPivotTable extends Migration
{
    public function up()
    {
        Schema::create('tag_new', function (Blueprint $table) {
            $table->unsignedInteger('new_id');

            $table->foreign('new_id', 'new_id_fk_20220829')->references('id')->on('news')->onDelete('cascade');

            $table->unsignedInteger('tag_id');

            $table->foreign('tag_id', 'tag_id_fk_20220829')->references('id')->on('tags')->onDelete('cascade');
        }
        );
    }
}
