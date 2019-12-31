<?php


namespace Acme;


class Book implements BookInterface
{
    public function open()
    {
        var_dump('opening the book.');
    }

    public function turnPage()
    {
        var_dump('turning the page of the paper book.');
    }
}
