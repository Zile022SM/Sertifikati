<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seo_title',50);
            $table->string('meta_description',191);
            $table->string('seo_title_h1',50);
            $table->string('alt_attribute',50);
            $table->text('description');
            $table->string('type',50);
            $table->string('image',191)->nullable();
            $table->string('video',191)->nullable();
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
        Schema::dropIfExists('bases');
    }
}
