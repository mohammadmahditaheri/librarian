<?php

namespace App\Data\Models;

use App\Enums\TablesEnum;
use App\Foundation\Composables\Models\Relationships\BookCopyRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory, BookCopyRelationships;

    protected $table = TablesEnum::BOOK_COPIES->value;
    protected $guarded = []; // TODO: development only

    protected $casts = [
      'is_available_r' => 'boolean'
    ];
}
