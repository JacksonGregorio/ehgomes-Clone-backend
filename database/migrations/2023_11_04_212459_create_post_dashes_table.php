<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('post_dashes', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('text');
            $table->string('link');
            $table->string('image');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('post_dashes');
    }
};
