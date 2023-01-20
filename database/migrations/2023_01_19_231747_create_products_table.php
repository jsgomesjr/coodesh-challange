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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('code', 60)->nullable();
            $table->enum('status', ['draft', 'trash', 'published'])->default('published')->nullable();
            $table->dateTime('imported_t')->nullable();
            $table->longText('url')->nullable();
            $table->string('creator', 60)->nullable();
            $table->string('created_t', 30)->nullable();
            $table->string('last_modified_t', 30)->nullable();
            $table->string('product_name', 255)->nullable();
            $table->string('quantity', 30)->nullable();
            $table->string('brands', 60)->nullable();
            $table->longText('categories')->nullable();
            $table->longText('labels')->nullable();
            $table->string('cities', 120)->nullable();
            $table->string('purchase_places', 120)->nullable();
            $table->string('stores', 100)->nullable();
            $table->longText('ingredients_text')->nullable();
            $table->longText('traces')->nullable();
            $table->string('serving_size', 30)->nullable();
            $table->string('serving_quantity', 15)->nullable();
            $table->string('nutriscore_score', 15)->nullable();
            $table->string('nutriscore_grade', 15)->nullable();
            $table->string('main_category', 20)->nullable();
            $table->longText('image_url')->nullable();

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
};
