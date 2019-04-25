<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('locations', function (Blueprint $table) {

   $table->increments('id');
   $table->string('name', 20);
   $table->integer('location_type_id')->unsigned();
   $table->integer('address_id')->unsigned();
   $table->text('description');

   $table->tinyInteger('status')->default(1);
   $table->timestamps();
   $table->softDeletes();

   $table->index(['address_id']);
   $table->foreign('address_id')
    ->references('id')
    ->on('addresses')
    ->onDelete('cascade')->onUpdate('cascade');

   $table->index(['location_type_id']);
   $table->foreign('location_type_id')
    ->references('id')
    ->on('master_location_types')
    ->onDelete('cascade')->onUpdate('cascade');

  });
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down()
 {
  Schema::dropIfExists('locations');
 }
}
