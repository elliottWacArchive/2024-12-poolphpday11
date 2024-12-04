<?php

class call_pangolin
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function correct($object) // proto
    {
        $test0 = "KO.";
        $test1 = "KO.";
        $test2 = "KO.";

        $verif1 = true;
        $verif2 = true;
        $verif3 = true;
        $i = 0;
        $attribute;
        $methode;

        foreach ($object as $val) {
            $ref = new ReflectionClass($val);
            $name = $ref->inNamespace();
            $final = $ref->isFinal();
            $clonable = $ref->isCloneable();
            $interface = $ref->getInterfaceNames();
            $parent = $ref->getParentClass();
            if (!$name) {
                $verif1 = false;
            }
            if (!$final || $clonable || ($interface != [] && $parent != [])) {
                $verif2 = false;
            }
            if ($i == 0) {
                $attribute = $ref->getAttributes();
                $methode = $ref->getMethods();
            } else {
                if (($ref->getAttributes() != $attribute) || ($ref->getMethods() != $methode)) {
                    $verif3 = false;
                }
                $attribute = $ref->getAttributes();
                $methode = $ref->getMethods();
            }
        }
        if ($verif1 === true) {
            $test0 = "Good !";
        }
        if ($verif2 === true) {
            $test1 = "Good !";
        }
        if ($verif3 === true) {
            $test2 = "Good !";
        }
        echo "Test 0 : $test0\n";
        echo "Test 1 : $test1\n";
        echo "Test 2 : $test2\n";
    }
}

// interface zizi {}
// class caca {}
// class pipi extends caca implements zizi {}

// $zizi = new pipi;
// $ref = new ReflectionClass($zizi);
// var_dump(($ref->getParentClass() != []));

// var_dump([1,2,3] == [1,2,3]);
