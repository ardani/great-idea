<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('disk', 32);
            $table->string('directory', 255);
            $table->string('filename', 255);
            $table->string('extension', 32);
            $table->string('mime_type', 128);
            $table->string('aggregate_type', 32);
            $table->unsignedInteger('size');
            $table->nullableTimestamps();

            $table->unique(['disk', 'directory', 'filename', 'extension'], 'media_disk_directory_filename_extension_unique');
            $table->index(['disk', 'directory'], 'media_disk_directory_index');
            $table->index('aggregate_type', 'media_aggregate_type_index');

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
