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
        Schema::create(TablesEnum::USERS->value, function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->nullable();
            $table->string('email', 128)
                ->nullable()
                ->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('secret', 128)->nullable();
            $table->timestamp('secret_expires_at')->nullable();
            $table->string('cellphone', 128)->unique();
            $table->timestamp('cellphone_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TablesEnum::USERS->value);
    }
};
