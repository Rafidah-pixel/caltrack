<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bmi_references', function (Blueprint $table) {

            $table->id();

            $table->enum('gender', [
                'Laki-laki',
                'Perempuan'
            ]);

            // umur dalam bulan
            $table->integer('age_month');

            // Batas WHO
            $table->float('minus3');
            $table->float('minus2');
            $table->float('minus1');
            $table->float('median');
            $table->float('plus1');
            $table->float('plus2');
            $table->float('plus3');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bmi_references');
    }
};