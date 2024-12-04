<?php

namespace Imperium
{
    use Chaos\Soldier as Csoldier;

    class Soldier
    {
        private $hp;
        private $attack;
        private $name;

        public function __construct($name, $hp = 50, $attack = 12)
        {
            $this->name = $name;
            $this->hp = $hp;
            $this->attack = $attack;
        }

        public function doDamage(Csoldier $soldat)
        {
            $newhp = ($soldat->getHp()) - $this->attack;
            $soldat->setHp($newhp);
        }

        public function getHp()
        {
            return $this->hp;
        }

        public function getAttack()
        {
            return $this->attack;
        }

        public function setHp($hp)
        {
            $this->hp = $hp;
        }

        public function getName()
        {
            return $this->name;
        }
        public function setName($name)
        {
            $this->name = $name;
        }
        public function setAttack($attack)
        {
            $this->attack = $attack;
        }
        public function __toString()
        {
            return $this->name . " the Imperium Space Marine : " . $this->hp . "HP.";
        }
    }
}

namespace Chaos
{
    use Imperium\Soldier as Isoldier;

    class Soldier
    {
        private $hp;
        private $attack;
        private $name;

        public function __construct($name, $hp = 70, $attack = 12)
        {
            $this->name = $name;
            $this->hp = $hp;
            $this->attack = $attack;
        }

        public function doDamage(Isoldier $soldat)
        {
            $newhp = ($soldat->getHp()) - $this->attack;
            $soldat->setHp($newhp);
        }

        public function getHp()
        {
            return $this->hp;
        }

        public function getAttack()
        {
            return $this->attack;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setHp($hp)
        {
            $this->hp = $hp;
        }

        public function setAttack($attack)
        {
            $this->attack = $attack;
        }

        public function __toString()
        {
            return $this->name . " the Chaos Space Marine : " . $this->hp . "HP.";
        }
    }
}

namespace
{
    class Scanner
    {
        public static function scan($soldat)
        {
            if (get_class($soldat) === "Imperium\Soldier") {
                echo "Praise be, Emperor, Lord.\n";
            } elseif (get_class($soldat) === "Chaos\Soldier") {
                echo "Xenos spotted.\n";
            }
        }
    }
}
