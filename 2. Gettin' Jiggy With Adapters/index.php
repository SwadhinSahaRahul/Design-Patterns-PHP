<?php

require 'vendor/autoload.php';

use Acme\Book;
use Acme\BookInterface;
use Acme\EReaderAdapter;
use Acme\Kindle;
use Acme\Nook;

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person())->read(new Book());
(new Person())->read(new EReaderAdapter(new Kindle()));
(new Person())->read(new EReaderAdapter(new Nook()));
