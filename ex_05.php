<?php

class Pangolin
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function correct($object) // proto
    {
        $reflection = new ReflectionClass($object);
        $test0 = "KO.";
        $test1 = "KO.";
        $test2 = "KO.";
        $test3 = "KO.";
        $instantiable = $reflection->isInstantiable();
        if (get_class($object) == "Arcaniste" && $instantiable) {
            $test0 = "Good !";
        }
        $interface = $reflection->getInterfaceNames();
        if (get_class($object) == "Arcaniste" && in_array("iPerso", $interface)) {
            $test1 = "Good !";
        }
        $extend = $reflection->isSubclassOf("aUnit");
        if (get_class($object) == "Arcaniste" && $extend) {
            $test2 = "Good !";
        }
        $reflunit = new ReflectionClass('aUnit');
        $instantiableu = $reflunit->isInstantiable();
        if ($instantiableu) {
            $test3 = "Good !";
        }
        echo "Test 0 : $test0\n";
        echo "Test 1 : $test1\n";
        echo "Test 2 : $test2\n";
        echo "Test 3 : $test3\n";
    }
}
