<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('city');
            $table->string('village');
            $table->string('profession');
            $table->text('socialNetworks');
            $table->string('field');
            $table->string('avatar');
            $table->string('mobileNumber1');
            $table->string('mobileNumber2');
            $table->string('telephoneNumber');
            $table->string('password');
            $table->timestamp('created_at')->nullable();
            $table->tinyInteger('status')->default(1); #  (1-byte) lingth

        });
        Schema::create('engineer_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('belongs_to');
            $table->string('imagePath');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engineers');
        Schema::dropIfExists('engineer_images');
    }
}
