<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('price',15,2);
            $table->integer('qty');
            $table->integer('o_qty')->nullable()->default(0);
            $table->string('source')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subCategory_id')->nullable();
            $table->integer('productgroup_id')->nullable();
            $table->string('postage')->nullable();
            $table->string('status')->default('Available'); 
            $table->softDeletes();
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
