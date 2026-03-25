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
        Schema::create('diplomas', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_id');
            $table->string('degree');
            $table->date('issue_date');
            $table->string('hash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomas');
    }
};
Schema::create('diplomas', function (Blueprint $table) {
    $table->id();
    $table->string('student_name');
    $table->string('student_id');
    $table->string('degree');
    $table->string('institution');
    $table->string('issue_date');
    $table->string('hash');
    $table->timestamps();
});
