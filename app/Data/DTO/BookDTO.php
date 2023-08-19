<?php

namespace App\Data\DTO;

use App\Data\Models\Book;
use App\Data\Models\Category;
use App\Data\Models\Language;
use App\Data\Models\Publisher;
use App\Foundation\Composables\Data\PresentsThroughResource;
use App\Services\Books\Contracts\Repositories\BookRepositoryInterface;
use App\Services\Books\Http\Resources\BookResource;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class BookDTO
{
    use PresentsThroughResource;

    const NOT_NULLABLE_COLUMNS = [
        'id',
        'publisher_id',
        'category_id',
        'language_id',
        'title',
    ];

    private Book|null $model = null;

    /**
     * @var class-string<BookResource> $resourceClass
     */
    private string $resourceClass = BookResource::class;

    public function __construct(
        public int|null                           $id,
        public int|null                           $publisher_id,
        public int|null                           $category_id,
        public int|null                           $language_id,
        public string|null                        $title,
        public string|null                        $description,
        public int|null                           $published_at_year,
        public int|null                           $number_of_pages,
        public Carbon|string|null                 $created_at,
        public Carbon|string|null                 $updated_at,
        public Collection|EloquentCollection|null $authors = null,
        public Category|null                      $category = null,
        public Publisher|null                     $publisher = null,
        public Language|null                      $language = null,
        public Collection|EloquentCollection|null $copies = null,
    )
    {
    }

    public static function from(Book $book): BookDTO
    {
        $bookDto = new BookDTO(...self::instantiable($book));
        $bookDto->model = $book;

        return $bookDto;
    }

    public function toArray(): array
    {
        $arrayedDto = [];
        foreach ($this as $column => $value) {
            if ($value !== null) {
                $arrayedDto[$column] = $value;
            }
        }

        return $arrayedDto;
    }

    /**
     * ----------------------------------------------------
     * ------------------ Private Methods -----------------
     * ----------------------------------------------------
     */

    private static function instantiable(Book $book): array
    {
        return [
            ...$book->getAttributes(),
            ...$book->getRelations()
        ];
    }

    public function getModel(): ?Book
    {
        if ($this->model === null && $this->id !== null) {
            $this->loadModel();
        }
        return $this->model;
    }

    private function loadModel(): void
    {
        /**
         * @var BookRepositoryInterface $repository
         */
        $repository = resolve(BookRepositoryInterface::class);
        $this->model = $repository->findModel($this->id);
    }
}
