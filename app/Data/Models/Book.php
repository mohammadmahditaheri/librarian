<?php

namespace App\Data\Models;

use App\Enums\TablesEnum;
use App\Foundation\Composables\Models\Relationships\BookRelationships;
use App\Services\Books\database\factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory,
        BookRelationships;

    const COLUMNS = [
        'id',
        'publisher_id',
        'category_id',
        'language_id',
        'title',
        'description',
        'published_at_year',
        'number_of_pages',
        'created_at',
        'updated_at'
    ];

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
