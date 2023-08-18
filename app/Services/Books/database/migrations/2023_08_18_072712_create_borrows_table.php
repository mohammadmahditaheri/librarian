<?php

use App\Enums\TablesEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TablesEnum::BORROWS->value, function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_copy_id')
                ->constrained(TablesEnum::BOOK_COPIES->value);
            $table->foreignId('user_id')
                ->constrained(TablesEnum::USERS->value);
            $table->timestamp('borrowed_at')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TablesEnum::BORROWS->value);
    }
};
