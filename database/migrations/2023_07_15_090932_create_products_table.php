<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->unique();
            $table->double('price');
            $table->boolean('available')->default(true);
            $table->boolean('onSpecial_list')->default(false);
            $table->boolean('onWelcomeList')->default(false);
            $table->integer('discount')->default(0);
            $table->integer('quantity');
            $table->text('desc')->default('no desc');
            $table->text('incrediant')->default('no incrediant');
            $table->text('special_desc')->default('no special desc desc');;
            $table->string('title')->default('no title');;
            $table->text('imageUrl')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
