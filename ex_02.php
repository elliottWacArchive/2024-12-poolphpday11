<?php

interface iCars
{
    public function getPrice();
    public function getWeight();
    public function mineIsBigger(object $obj);
}

class Car implements iCars
{
    private $_price;
    private $_weight;

    public function __construct($price, $weight = 4242)
    {
        $this->_price = $price;
        $this->_weight = $weight;
    }

    public function getPrice()
    {
        return $this->_price;
    }
    public function getWeight()
    {
        return $this->_weight;
    }
    public function mineIsBigger(object $obj)
    {
        switch (get_class($obj)) {
            case "Toyota":
                echo "Mine is bigger";
                break;
            case "Smart":
                echo "Mine is way bigger !";
                break;
            case "Velib":
                echo "LOL";
                break;
            default:
                echo "Show me !";
        }
    }
}

class BMW extends Car implements iCars
{
    private $_price;
    private $_weight;

    public static function lessExpensive()
    {
        return 15000;
    }
}

class Suzuki extends Car implements iCars
{
    private $_price;
    private $_weight;

    public static function lessExpensive()
    {
        return 5000;
    }
}
