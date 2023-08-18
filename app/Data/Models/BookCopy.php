<?php

namespace App\Data\Models;

use App\Enums\TablesEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCopy extends Model
{
    use HasFactory;

    protected $table = TablesEnum::BOOK_COPIES->value;
    protected $guarded = []; // TODO: development only
}
