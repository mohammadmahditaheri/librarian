<?php

use App\Enums\TablesEnum;
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
        Schema::create(TablesEnum::BOOK_COPIES->value, function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')
                ->constrained(TablesEnum::BOOKS->value);

            $table->string('library_code', 128);
            $table->boolean('is_available_r')
                ->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TablesEnum::BOOK_COPIES->value);
    }
};
