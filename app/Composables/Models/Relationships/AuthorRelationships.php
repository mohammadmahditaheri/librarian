<?php

namespace App\Composables\Models\Relationships;

use App\Data\Models\Book;
use App\Enums\TablesEnum;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait AuthorRelationships
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(related: Book::class);
    }
}
