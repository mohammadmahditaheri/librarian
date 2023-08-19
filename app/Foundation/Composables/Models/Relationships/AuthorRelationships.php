<?php

namespace App\Foundation\Composables\Models\Relationships;

use App\Data\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait AuthorRelationships
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(related: Book::class);
    }
}
