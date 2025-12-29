<?php


interface CanBePainted
{
    public function costToPaint();
}

abstract class Shape implements CanBePainted
{
    protected $isPreferred = false;

    public function __construct(
        public $numberOfSides
    ) {}

    abstract public function perimeter();

    public function area()
    {
        throw new Exception("Not implemented");
    }
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

    public function area()
    {
        return $this->length *  $this->breadth;
    }

    public function perimeter()
    {
        return 2 * ($this->length + $this->breadth);
    }

    public function costToPaint()
    {
        return $this->area() * 2;
    }
}

class Square extends Rectangle
{
    public function __construct(int $length)
    {
        parent::__construct($length, $length);
    }

    public function costToPaint()
    {
        return $this->area() * 1.5;
    }
}

class Circle extends Shape
{
    public float $radius;

    private $pi = 22 / 7;

    public function __construct(float $radius)
    {
        parent::__construct(0);
        $this->isPreferred = true;
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius(float $radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return $this->pi * pow($this->radius, 2);
    }

    public function perimeter()
    {
        return 2 * $this->pi * $this->radius;
    }

    public function costToPaint()
    {
        return $this->area() * 3;
    }
}

$rectangle = new Rectangle(10, 5);
$square = new Square(12);
$circle = new Circle(22);

echo "Area of rectangle is: " . $rectangle->area();
echo ". Perimeter of rectangle is: " . $rectangle->perimeter();
echo ". Rectangle has " . $rectangle->numberOfSides . " sides.";
echo ". Cost to Paint: " . $rectangle->costToPaint();

echo "<br>";

echo "Area of square is: " . $square->area();
echo ". Perimeter of square is: " . $square->perimeter();
echo ". Square has " . $square->numberOfSides . " sides.";
echo ". Cost to Paint: " . $square->costToPaint();

echo "<br>";

echo "Area of circle is: " . $circle->area();
echo ". Perimeter of circle is: " . $circle->perimeter();
echo ". Circle has " . $circle->numberOfSides . " sides.";
echo ". Cost to Paint: " . $circle->costToPaint();
