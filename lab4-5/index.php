<?php

class Circle
{
    private $x;
    private $y;
    private $radius;

    public function __construct($x, $y, $radius)
    {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    public function __toString()
    {
        return "Коло з центром в ({$this->x}, {$this->y}) і радіусом {$this->radius}";
    }

    public function intersectsWith(Circle $circle)
    {
        $distance = sqrt(pow($this->x - $circle->getX(), 2) + pow($this->y - $circle->getY(), 2));
        $sumOfRadius = $this->radius + $circle->getRadius();

        return $distance <= $sumOfRadius;
    }
}

// Перевірка роботи класу
$circle1 = new Circle(0, 0, 5);
$circle2 = new Circle(8, 8, 5);

echo $circle1 . "\n";
echo $circle2 . "\n";

echo "Перетинаються? " . ($circle1->intersectsWith($circle2) ? "Так" : "Ні") . "\n";
?>
