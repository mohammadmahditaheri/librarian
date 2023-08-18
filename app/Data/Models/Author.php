<?php

namespace App\Data\Models;

use App\Enums\TablesEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $table = TablesEnum::AUTHORS->value;
    protected $guarded = []; // TODO: development only
}
