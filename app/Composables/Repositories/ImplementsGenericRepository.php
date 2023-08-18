<?php

namespace App\Composables\Repositories;

trait ImplementsGenericRepository
{
    use CreatesGenerically,
        FindsGenerically,
        GetsGenerically;
}
