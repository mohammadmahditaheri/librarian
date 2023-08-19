<?php

namespace App\Composables\Models\Relationships;

use App\Data\Models\Author;
use App\Data\Models\BookCopy;
use App\Data\Models\Category;
use App\Data\Models\Language;
use App\Data\Models\Publisher;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait BookRelationships
{
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function copies(): HasMany
    {
        return $this->hasMany(BookCopy::class);
    }
}
