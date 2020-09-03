<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->boolean('type');
            $table->string('category')->nullable();
            $table->string('text')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->boolean('showmenu')->nullable();
            $table->boolean('showindex')->default(0);
            $table->boolean('checkmenutop')->default(0);
            $table->boolean('submenu')->default(0)->nullable();
            $table->boolean('submenu2')->default(0)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
