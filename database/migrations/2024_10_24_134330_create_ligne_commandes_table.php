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
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            // Create a foreign key column 'product_id' that stores unsigned big integer values
            $table->unsignedBigInteger('product_id');
            // Set 'product_id' as a foreign key that references the 'id' field in the 'products' table
            // If a related record in 'products' is deleted, this record will be deleted as well due to 'onDelete('cascade')'
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // Create a foreign key column 'command_id' that stores unsigned big integer values
            $table->unsignedBigInteger('command_id');
            // Set 'command_id' as a foreign key that references the 'id' field in the 'commands' table
            // If a related record in 'commands' is deleted, this record will be deleted as well due to 'onDelete('cascade')'
            $table->foreign('command_id')->references('id')->on('commands')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
