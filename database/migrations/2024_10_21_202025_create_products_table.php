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
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->integer('quantity');
            $table->string('photo');
            // Create a foreign key column 'category_id' that stores unsigned big integer values
            $table->unsignedBigInteger('category_id');
            // Set 'category_id' as a foreign key that references the 'id' field in the 'categories' table
            // If a related record in 'categories' is deleted, this record will be deleted as well due to 'onDelete('cascade')'
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
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
