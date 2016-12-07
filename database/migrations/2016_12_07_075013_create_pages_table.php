<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->string('title', 255);
            $table->text('excerpt');
            $table->text('body');
            $table->string('image', 255)->nullable();
            $table->string('slug', 255);
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('INACTIVE');
            $table->nullableTimestamps();

            $table->unique('slug', 'pages_slug_unique');

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}