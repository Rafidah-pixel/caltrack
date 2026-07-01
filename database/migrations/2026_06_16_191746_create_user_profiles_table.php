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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('age');
            
            // Pilihan enum menggunakan bahasa Indonesia sesuai request
            $table->enum('gender', ['laki-laki', 'perempuan']); 
            
            // Menggunakan decimal agar mendukung angka koma/pecahan
            $table->decimal('weight', 5, 2);
            $table->decimal('height', 5, 2);
            
            $table->enum('activity_level', [
                'sedentary',
                'light',
                'moderate',
                'active',
                'very_active'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};