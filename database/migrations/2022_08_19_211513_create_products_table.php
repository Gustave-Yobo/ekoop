<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('qty');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
