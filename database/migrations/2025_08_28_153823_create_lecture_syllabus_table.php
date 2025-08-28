<?php

use App\Models\Lecture;
use App\Models\Syllabus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lecture_syllabus', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Syllabus::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Lecture::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_syllabus');
    }
};
