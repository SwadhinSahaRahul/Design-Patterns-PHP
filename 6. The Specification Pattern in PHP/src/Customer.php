<?php


class Customer
{
    protected $plan;

    /**
     * Customer constructor.
     * @param $plan
     */
    public function __construct($plan)
    {
        $this->plan = $plan;
    }

    public function plan()
    {
        return $this->plan;
    }
}
