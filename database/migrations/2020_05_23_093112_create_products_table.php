<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nametext')->nullable();
            $table->string('nametext2')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('productnew')->default(0);
            $table->boolean('producthot')->default(0);
            $table->string('color')->nullable();
            $table->string('price1')->nullable();
            $table->string('price2')->nullable();
            $table->string('avatar')->nullable();
            $table->text('option')->nullable();
            $table->longText('info1')->nullable();
            $table->longText('info2')->nullable();
            $table->longText('info3')->nullable();
            $table->longText('info4')->nullable();
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
        Schema::dropIfExists('products');
    }
}
