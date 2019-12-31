<?php


namespace Acme;


class eReaderAdapter implements BookInterface
{

    private $reader;

    /**
     * eReaderAdapter constructor.
     * @param eReaderInterface $reader
     */
    public function __construct(eReaderInterface $reader)
    {
        $this->reader = $reader;
    }


    public function turnPage()
    {
        return $this->reader->pressNextButton();
    }

    public function open()
    {
        return $this->reader->turnOn();
    }
}