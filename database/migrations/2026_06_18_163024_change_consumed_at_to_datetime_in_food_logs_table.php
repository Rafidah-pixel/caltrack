<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('food_logs', function (Blueprint $table) {
            $table->dateTime('consumed_at')->change();
        });
    }

    public function down(): void
    {
        Schema::table('food_logs', function (Blueprint $table) {
            $table->date('consumed_at')->change();
        });
    }
};