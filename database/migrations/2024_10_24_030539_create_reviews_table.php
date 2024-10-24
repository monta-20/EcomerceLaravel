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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->float('rate');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            // Set 'user_id' as a foreign key that references the 'id' field in the 'users' table
            // If a related record in 'users' is deleted, this record will be deleted as well due to 'onDelete('cascade')'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            // Set 'product_id' as a foreign key that references the 'id' field in the 'products' table
            // If a related record in 'products' is deleted, this record will be deleted as well due to 'onDelete('cascade')'
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
