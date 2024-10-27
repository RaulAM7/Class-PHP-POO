<?php
// Definir classes con constructor de la manera antigua
class Car 
{
    public $make;
    public $model;
    public $year;
    
    public function __construct(
        string $make, 
        string $model, 
        int $year
    ) 
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    public function __destruct()
    {
        echo 'Distroying: '. $this->make.' '.$this->model.PHP_EOL;
    }
}
$myCar = new Car('Toyota', 'Corolla', 2020);

// Definir propiedades con el nuevo metodo de PHP 8: promoted properties in constructor
class Motorbike 
{
    public function __construct(
        public string $make, 
        public string $model, 
        public int $year
    ) 
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
}

