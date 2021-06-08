<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{

    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->increments(['article_id', 'user_id']);
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreignId('article_id')
            ->constrained()
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
        });
    }


    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
