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
    {   //Ignore Existing Tables: If the table already exists and you don’t want to recreate it
        if (!Schema::hasTable('commandes')) {
            Schema::create('commandes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->enum('state', ['in progress', 'pay'])->default('in progress');
                $table->unsignedBigInteger('client_id');
                $table->timestamps();
                // Assuming you're setting up a foreign key constraint for client_id
                $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
