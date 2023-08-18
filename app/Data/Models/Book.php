<?php

namespace App\Data\Models;

use App\Enums\TablesEnum;
use App\Services\Books\database\factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = TablesEnum::BOOKS->value;
    protected $guarded = []; // TODO: development only

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return BookFactory::new();
    }
}
