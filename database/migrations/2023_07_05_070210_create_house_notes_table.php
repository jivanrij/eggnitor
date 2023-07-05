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
        Schema::create('house_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('house_id')->constrained();
            $table->text('note');
            $table->timestamps();
        });
    }
};
