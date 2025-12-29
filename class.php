<?php

abstract class Shape
{
    public function __construct(
        public $numberOfSides
    ) {}
}

class Rectangle extends Shape
{
    public int $length;
    public int $breadth;

    public function __construct(int $length, int $breadth)
    {
        parent::__construct(4);
        $this->length = $length;
        $this->breadth = $breadth;
    }

    public function area() {
        return $this->length *  $this->breadth;
    }
}

$rectangle = new Rectangle(10, 5);

echo "Area of rectangle is: " . $rectangle->area();
echo ". Rectangle has " . $rectangle->numberOfSides . " sides.";