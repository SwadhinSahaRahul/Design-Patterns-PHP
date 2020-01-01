<?php


/**
 * Class HomeChecker
 */
abstract class HomeChecker
{
    protected $successor;

    abstract public function check(HomeStatus $home);

    public function succeedWith(HomeChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next(HomeStatus $homeStatus)
    {
        if ($this->successor) {
            $this->successor->check($homeStatus);
        }
    }
}

/**
 * Class Locks
 */
class Locks extends HomeChecker
{
    public function check(HomeStatus $homeStatus)
    {
        if (!$homeStatus->locked) {
            throw new Exception('Doors are not locked. Abort! Abort!');
        }
        $this->next($homeStatus);
    }
}


/**
 * Class Lights
 */
class Lights extends HomeChecker
{
    public function check(HomeStatus $homeStatus)
    {
        if (!$homeStatus->lightsOff) {
            throw new Exception('lights are on. Abort! Abort!');
        }
        $this->next($homeStatus);
    }
}

/**
 * Class Alarm
 */
class Alarm extends HomeChecker
{
    public function check(HomeStatus $homeStatus)
    {
        if (!$homeStatus->alarmOn) {
            throw new Exception('Alarms are off. Abort! Abort!');
        }
        $this->next($homeStatus);
    }
}

/**
 * Class HomeStatus
 */
class HomeStatus
{
    public $locked = true;
    public $lightsOff = true;
    public $alarmOn = true;
}

$locks = new Locks();
$lights = new Lights();
$alarm = new Alarm();

$locks->succeedWith($lights);
$lights->succeedWith($alarm);

$status = new HomeStatus();

$locks->check($status);
