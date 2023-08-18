<?php

namespace App\Data\Models;

use App\Enums\TablesEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = TablesEnum::CATEGORIES->value;
    protected $guarded = []; // TODO: development only

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
