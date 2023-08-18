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
        Schema::create(TablesEnum::AUTHOR_BOOK->value, function (Blueprint $table) {
            $table->foreignId('author_id')
                ->constrained(TablesEnum::AUTHORS->value);
            $table->foreignId('book_id')
                ->constrained(TablesEnum::BOOKS->value);
            $table->primary(['author_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TablesEnum::AUTHOR_BOOK->value);
    }
};
