<?php

namespace App\Data\Models;

use App\Enums\TablesEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{
    use HasFactory;

    protected $table = TablesEnum::BORROWS->value;
    protected $guarded = []; // TODO: development only
}
