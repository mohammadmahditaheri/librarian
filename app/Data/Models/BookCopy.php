<?php

namespace App\Data\Models;

use App\Composables\Models\Relationships\BookCopyRelationships;
use App\Enums\TablesEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCopy extends Model
{
    use HasFactory, BookCopyRelationships;

    protected $table = TablesEnum::BOOK_COPIES->value;
    protected $guarded = []; // TODO: development only

    protected $casts = [
      'is_available_r' => 'boolean'
    ];
}
