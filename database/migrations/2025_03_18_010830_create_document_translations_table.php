<?php

use App\Enums\Language;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('country_code', 4);
            $table->string('phone');
            $table->enum('source_language', Language::names());
            $table->enum('target_language', Language::names());
            $table->string('path');
            $table->text('ocr_text');
            $table->integer('numbers_words');
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_translations');
    }
};
