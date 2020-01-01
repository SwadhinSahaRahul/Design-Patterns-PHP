<?php


namespace App;


class VeggieSub extends Sub
{
    protected function addPrimaryToppings()
    {
        var_dump('add some veggies');
        return $this;
    }
}
