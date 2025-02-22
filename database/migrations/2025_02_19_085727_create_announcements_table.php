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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 255); 
            $table->text('description');
            $table->decimal('prix', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['actif', 'brouillon', 'archive'])->default('actif');
            $table->foreignId('user_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('category_id')->constrained('categories')->onUpdate('restrict')->onDelete('restrict'); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};