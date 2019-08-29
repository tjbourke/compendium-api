<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('caption', 255)->default('');
            $table->text('description')->nullable();
            $table->text('special_characteristics')->nullable();
            $table->string('photo_url', '1024');
            $table->string('species', 50)->default('');
            $table->string('sub_species', 100)->default('');
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->date('photographed_on')->nullable();
            $table->unsignedBigInteger('location_id')->nullable()->default(null);
            $table->unsignedBigInteger('photographer_id')->nullable()->default(null);
            $table->unsignedBigInteger('parent_photo_id')->nullable()->default(null);
            $table->string('status', 50)->default('Active');
            $table->timestamps();
        });
    }
}
