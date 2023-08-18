<?php

namespace App\Enums;

enum TablesEnum: string
{
    case USERS = 'users';
    case AUTHORS = 'authors';
    case AUTHOR_BOOK = 'author_book';
    case CATEGORIES = 'categories';
    case PUBLISHERS = 'publishers';
    case BOOKS = 'books';
    case BOOK_COPIES = 'book_copies';
    case BORROWS = 'borrows';

    case LANGUAGES = 'languages';
}
