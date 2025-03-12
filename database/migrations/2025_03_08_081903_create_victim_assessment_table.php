<!-- database/migrations/2025_03_08_081903_create_victim_assessment_table.php -->
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
        Schema::create('victim_assessment', function (Blueprint $table) {
            $table->id();
            $table->json('questions'); // Store questions as JSON array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victim_assessment');
    }
};