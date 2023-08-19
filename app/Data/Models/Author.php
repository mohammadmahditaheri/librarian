<?php

namespace App\Data\Models;

use App\Enums\TablesEnum;
use App\Foundation\Composables\Models\Relationships\AuthorRelationships;
use App\Services\Books\database\factories\AuthorFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
