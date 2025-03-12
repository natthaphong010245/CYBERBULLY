// database/migrations/2025_03_09_000000_create_mental_health_assessment_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mental_health_assessment', function (Blueprint $table) {
            $table->id();
            $table->json('stress'); // เก็บคำตอบด้านความเครียด (ข้อ 1-7)
            $table->json('anxiety'); // เก็บคำตอบด้านภาวะวิตกกังวล (ข้อ 8-14)
            $table->json('depression'); // เก็บคำตอบด้านภาวะซึมเศร้า (ข้อ 15-21)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mental_health_assessment');
    }
};