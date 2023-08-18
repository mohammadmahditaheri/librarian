<?php

namespace App\Data\Models;

use App\Composables\Models\Relationships\AuthorRelationships;
use App\Enums\TablesEnum;
use App\Services\Books\database\factories\AuthorFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory,
        AuthorRelationships;

    protected $table = TablesEnum::AUTHORS->value;
    protected $guarded = []; // TODO: development only

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return AuthorFactory::new();
    }
}
