<?php

namespace App\Services\Books\Features;

use App\Domains\Book\Jobs\FetchBooksByFiltersJob;
use App\Domains\Book\Requests\FetchBooksRequest;
use App\Foundation\Composables\Presenters\CreatesConcretePresenter;
use App\Foundation\Composables\Presenters\PresentsViaPresenterStrategy;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class FetchBooksByFiltersFeature extends Feature
{
    use CreatesConcretePresenter,
        PresentsViaPresenterStrategy;

    public function __construct(private readonly FetchBooksByFiltersJob $fetchBooksByFiltersJob)
    {
    }

    public function handle(FetchBooksRequest $request): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application
    {
        // init presenter
        $presenter = $this->getConcretePresenter($request);

        $books = $this->fetchBooksByFiltersJob->handle($request->bookFilterData());

        return $this->present(
            presenter: $presenter,
            data: $books
        );
    }
}
