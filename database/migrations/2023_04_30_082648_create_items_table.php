<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('category_id');
            $table->integer('price');
            $table->integer('owner_id');
            $table->string('description');
            $table->enum('condition',['New','Used','Good Second Hand'])->default('New');
            $table->enum('type',['For Sell','For Buy','For Exchange'])->default('For Sell');
            $table->enum('status',['publish','none'])->default('none');
            $table->string('photo');
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
        Schema::dropIfExists('items');
    }
};
