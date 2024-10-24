<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Enum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->enum('state',['in progress','pay'])->default('en progress');
            // Create a foreign key column 'client_id' that stores unsigned big integer values
            $table->unsignedBigInteger('client_id');
            // Set 'client_id' as a foreign key that references the 'id' field in the 'user' table
            // If a related record in 'user' is deleted, this record will be deleted as well due to 'onDelete('cascade')'
            $table->foreign('client_id')->references('id')->on('user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
