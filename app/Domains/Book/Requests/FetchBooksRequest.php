<?php

namespace App\Domains\Book\Requests;

use App\Enums\TablesEnum;
use App\Services\Books\ValueObjects\BookFiltersData;
use Illuminate\Foundation\Http\FormRequest;

class FetchBooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $categoriesTable = TablesEnum::CATEGORIES->value;
        $languagesTable = TablesEnum::LANGUAGES->value;
        $publishers = TablesEnum::PUBLISHERS->value;
        $authorsTable = TablesEnum::AUTHORS->value;

        return [
            'filters.category_id' => [
                'nullable',
                'integer',
                "exists:$categoriesTable,id"
            ],
            'filters.publisher_id' => [
                'nullable',
                'integer',
                "exists:$publishers,id"
            ],
            'filters.language_id' => [
                'nullable',
                'integer',
                "exists:$languagesTable,id"
            ],
            'filters.author_id' => [
                'nullable',
                'integer',
                "exists:$authorsTable,id"
            ],
            'filters.published_at_year' => [
                'nullable',
                'integer',
                'digits:4',
                'min:1800',
                'max:' . (date('Y') + 1)
            ],
            'filters.library_code' => [
                'nullable',
                'string',
                'max:128'
            ],
            'search_query' => [
                'nullable',
                'string',
            ],
            'perPage' => [
                'integer'
            ]
        ];
    }

    public function categoryId(): ?int
    {
        return $this->validated('filters.category_id');
    }

    public function publisherId(): ?int
    {
        return $this->validated('filters.publisher_id');
    }

    public function languageId(): ?int
    {
        return $this->validated('filters.language_id');
    }

    public function authorId(): ?int
    {
        return $this->validated('filters.author_id');
    }

    public function searchQuery(): ?string
    {
        return $this->validated('search_query');
    }

    public function publishedAtYear(): ?int
    {
        return $this->validated('filters.published_at_year');
    }

    public function libraryCode(): ?string
    {
        return $this->validated('filters.library_code');
    }

    public function perPage(): ?int
    {
        return $this->validated('perPage');
    }

    public function bookFilterData(): BookFiltersData
    {
        return new BookFiltersData(
            publisher_id: $this->publisherId(),
            category_id: $this->categoryId(),
            language_id: $this->languageId(),
            author_id: $this->authorId(),
            search_query: $this->searchQuery(),
            published_at_year: $this->publishedAtYear(),
            library_code: $this->libraryCode(),
            perPage: $this->perPage()
        );
    }

}
