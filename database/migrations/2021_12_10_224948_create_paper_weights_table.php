<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weight_name')->nullable();
            $table->string('weight_image')->nullable();
            $table->integer('product_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('paper_types')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paper_weights');
    }
}
