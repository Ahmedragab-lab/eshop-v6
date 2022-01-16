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
            $table->foreignId('section_id')->nullable()->references('id')->on('sections')->cascadeOnDelete();
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->mediumText('small_desc');
            $table->longText('desc');
            $table->decimal('original_price');
            $table->decimal('selling_price')->nullable();
            $table->string('SKU');
            $table->enum('stock',['instock','outofstock']);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('qty')->default(10);
            $table->string('image')->nullable();
            $table->text('images')->nullable();
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
