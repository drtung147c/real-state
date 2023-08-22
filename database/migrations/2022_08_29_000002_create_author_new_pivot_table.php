<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorNewPivotTable extends Migration
{
    public function up()
    {
        Schema::create('author_new', function (Blueprint $table) {
            $table->unsignedInteger('new_id');

            $table->foreign('new_id', 'new_id_fk_220220829')->references('id')->on('news')->onDelete('cascade');

            $table->unsignedInteger('author_id');

            $table->foreign('author_id', 'author_id_fk_20220829')->references('id')->on('authors')->onDelete('cascade');
        }
        );
    }
}
