<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLevel2ItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_level2_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_level1_item_id');
            $table->integer('position');
            $table->string('menu_text', 100);
            $table->text('text');
            $table->timestamps();
            $table->foreign('menu_level1_item_id')->references('id')->on('menu_level1_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_level2_items');
    }
}
