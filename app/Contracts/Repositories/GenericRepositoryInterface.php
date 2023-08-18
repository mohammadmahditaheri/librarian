<?php

namespace App\Contracts\Repositories;

interface GenericRepositoryInterface extends
    GenericFinderRepositoryInterface,
    GenericReaderRepositoryInterface,
    GenericCreatorRepositoryInterface
{

}
