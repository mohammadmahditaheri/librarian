<?php

namespace App\Services\Books\Features;

use App\Contracts\Presenter\CreatesConcretePresenter;
use App\Contracts\Presenter\PresentsViaPresenterStrategy;
use App\Domains\Book\Jobs\GetBookWithAllRelationshipsJob;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Lucid\Units\Feature;

class GetBookWithAllRelationshipsFeature extends Feature
{
    use CreatesConcretePresenter,
        PresentsViaPresenterStrategy;

    const ERROR_MESSAGE_NOT_FOUND = 'The requested book does not exist.';

    public function __construct(
        private readonly GetBookWithAllRelationshipsJob $getBookWithAllRelationshipsJob
    )
    {
    }

    public function handle(Request $request, int $bookId): View|Application|Factory|ApplicationContract|Response
    {
        $presenter = $this->getConcretePresenter($request);
        $book = $this->getBookWithAllRelationshipsJob->handle($bookId);
        if (!$book) {
            throw $presenter->presentNotFoundError(
                extra: null,message: self::ERROR_MESSAGE_NOT_FOUND
            );
        }

        return $this->present(
            presenter: $presenter,
            data: $book->wrapInResource()
        );
    }
}
