<?php


namespace Acme;

class EReaderAdapter implements BookInterface
{
    private $reader;

    /**
     * eReaderAdapter constructor.
     * @param eReaderInterface $reader
     */
    public function __construct(EReaderInterface $reader)
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
