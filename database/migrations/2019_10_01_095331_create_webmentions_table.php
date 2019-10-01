<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebmentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webmentions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author_name');
            $table->string('author_photo');
            $table->string('author_link');
            $table->string('type');
            $table->string('link');
            $table->unsignedBigInteger('webmention_id')->unique();
            $table->text('content')->nullable();
            $table->string('post_id');
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
        Schema::dropIfExists('webmentions');
    }
}
