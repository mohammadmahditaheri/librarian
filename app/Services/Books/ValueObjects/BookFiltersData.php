<?php

namespace App\Services\Books\ValueObjects;

class BookFiltersData
{
    public function __construct(
        public int|null    $publisher_id = null,
        public int|null    $category_id = null,
        public int|null    $language_id = null,
        public int|null    $author_id = null,
        public string|null $search_query = null,
        public int|null $published_at_year = null,
        public string|null $library_code = null,
        public int|null $perPage
    )
    {
    }
}
