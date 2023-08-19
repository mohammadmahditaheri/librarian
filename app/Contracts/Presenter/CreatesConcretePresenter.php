<?php

namespace App\Contracts\Presenter;

use App\Foundation\Strategies\Presenter\ConcreteStrategies\AjaxPresenterStrategy;
use App\Foundation\Strategies\Presenter\ConcreteStrategies\AndroidPresenterStrategy;
use App\Foundation\Strategies\Presenter\ConcreteStrategies\ApiPresenterStrategy;
use App\Foundation\Strategies\Presenter\ConcreteStrategies\IosPresenterStrategy;
use App\Foundation\Strategies\Presenter\PresenterContext;
use Illuminate\Http\Request;

trait CreatesConcretePresenter
{
    const ANDROID_USER_AGENT = 'Android';
    const IOS_USER_AGENT = 'iOS';

    private function getConcretePresenter(Request $request): PresenterContext
    {
        if ($request->ajax()) {
            return new PresenterContext(new AjaxPresenterStrategy());
        } else if ($this->requestedWithAndroid($request)) {
            return new  PresenterContext(new AndroidPresenterStrategy());
        } else if ($this->requestedWithIPhone($request)) {
            return new  PresenterContext(new IosPresenterStrategy());
        } else {
            return new  PresenterContext(new ApiPresenterStrategy());
        }
    }

    private function requestedWithAndroid(Request $request): bool
    {
        return ($request->userAgent() === self::ANDROID_USER_AGENT);
    }

    private function requestedWithIPhone(Request $request): bool
    {
        return ($request->userAgent() === self::IOS_USER_AGENT);
    }
}
