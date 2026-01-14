<?php

use App\Models\ComfortCategory;
use App\Models\Position;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('position_comfort_category', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Position::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ComfortCategory::class)->constrained()->cascadeOnDelete();
            $table->unique(['position_id', 'comfort_category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('position_comfort_category');
    }
};
