<?php

namespace App\Foundation\Composables\Presenters;

use App\Foundation\Strategies\Presenter\PresenterContext;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;

trait PresentsViaPresenterStrategy
{
    private function present(PresenterContext $presenter, mixed $data): View|Application|Factory|ApplicationContract|Response
    {
        return $presenter->present($data);
    }
}
