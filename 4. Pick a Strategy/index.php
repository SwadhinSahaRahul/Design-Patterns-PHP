<?php

//Define a family of algorithms


interface Logger
{
    public function log($data);
}

class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to file.');
    }

}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to Database.');
    }

}

class LogToWebService implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to sass site.');
    }

}


class App
{
    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?? new LogToFile();
        $logger->log($data);
    }
}

$app = new App();
$app->log('ddsdsds', new LogToDatabase());
