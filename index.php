<?php

// Definir classes con constructor de la manera antigua


class Car {
    public $make;
    public $model;
    public $year;

    public function __construct(string $make, string $model, int $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
}

$myCar = new Car('Toyota', 'Corolla', 2020);