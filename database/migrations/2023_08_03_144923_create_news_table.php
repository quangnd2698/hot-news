<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title', 1000);
            $table->text('short_description', 1500);
            $table->mediumText('content');
            $table->integer('author_id');
            $table->string('slug', 1000);
            $table->dateTime('published_at');
            $table->string('image_url', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
