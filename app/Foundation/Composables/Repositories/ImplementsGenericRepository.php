<?php

namespace App\Foundation\Composables\Repositories;

trait ImplementsGenericRepository
{
    use CreatesGenerically,
        FindsGenerically,
        GetsGenerically;
}
