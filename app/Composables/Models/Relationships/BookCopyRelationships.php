<?php

namespace App\Composables\Models\Relationships;

use App\Data\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BookCopyRelationships
{
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
