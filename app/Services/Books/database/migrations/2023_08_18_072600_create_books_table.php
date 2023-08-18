<?php

use App\Enums\TablesEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TablesEnum::BOOKS->value, function (Blueprint $table) {
            $table->id();

            $table->foreignId('publisher_id')
                ->constrained(TablesEnum::PUBLISHERS->value);
            $table->foreignId('category_id')
                ->constrained(TablesEnum::CATEGORIES->value);
            $table->foreignId('language_id')
                ->constrained(TablesEnum::LANGUAGES->value);

            $table->string('title', 128);
            $table->string('description')->nullable();
            $table->unsignedSmallInteger('published_at_year')
                ->nullable();
            $table->unsignedSmallInteger('number_of_pages')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TablesEnum::BOOKS->value);
    }
};
