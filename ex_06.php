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
        $test0 = "KO.";
        $test1 = "KO.";
        $test2 = "KO.";

        $verif1 = true;
        $verif2 = true;
        $verif3 = true;
        $i = 0;
        $attribute = null;
        $methode = null;

        foreach ($object as $val) {
            $ref = new ReflectionClass($val);

            if (!$ref->inNamespace()) {
                $verif1 = false;
            }

            $final = $ref->isFinal();
            $clonable = $ref->isCloneable();
            $interface = $ref->getInterfaceNames();
            $parent = $ref->getParentClass();

            if (!$final || $clonable || !empty($interface) || $parent) {
                $verif2 = false;
            }
            $newattr = $ref->getProperties();
            $newmeth = $ref->getMethods();
            if ($i === 0) {
                $attribute = $newattr;
                $methode = $newmeth;
            } else {
                if (!$this->compareAttributes($attribute, $newattr) || !$this->compareMethods($methode, $newmeth)) {
                    $verif3 = false;
                }
            }
            $i++;
        }
        if ($verif1) {
            $test0 = "Good !";
        }
        if ($verif2) {
            $test1 = "Good !";
        }
        if ($verif3) {
            $test2 = "Good !";
        }
        echo "Test 0 : $test0\n";
        echo "Test 1 : $test1\n";
        echo "Test 2 : $test2\n";
    }

    private function compareAttributes($attributes1, $attributes2)
    {
        if (count($attributes1) !== count($attributes2)) {
            return false;
        }
        foreach ($attributes1 as $i => $attr1) {
            $attr2 = $attributes2[$i];
            if ($attr1->getName() !== $attr2->getName() || $attr1->getModifiers() !== $attr2->getModifiers()) {
                return false;
            }
        }
        return true;
    }

    private function compareMethods($methods1, $methods2)
    {
        if (count($methods1) !== count($methods2)) {
            return false;
        }
        foreach ($methods1 as $i => $method1) {
            $method2 = $methods2[$i];
            if ($method1->getName() !== $method2->getName() || $method1->getModifiers() !== $method2->getModifiers()) {
                return false;
            }
        }
        return true;
    }
}
