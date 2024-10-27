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
    public function getProperties()
    {
        return $this;
    }
    public function __destruct()
    {
        echo 'Distroying: '. $this->make.' '.$this->model.PHP_EOL;
    }
    public static function instanceFromBasicData(string $make, string $model, int $year): static
    {
        $newCar = new static($make, $model, $year);
        return $newCar;
    }
    public static function instanceFromArray(array $arr): static 
    {
        $data = $arr;
        return new static ($data['make'], $data['model'], $data['year']);

    }
    public static function instanceFromJson(string $json): static
    {
        $data = json_decode($json, true);
        return new static ($data['make'], $data['model'], $data['year']);
    }
    public static function instanceFromXml(string $xml): static
    {
        //define convert_xml_to_array($xml), la siguiente linea es $data = convert_xml_to_array($xml)
        $data = $xml;
        return new static ($data['make'], $data['model'], $data['year']);
    }
}
$myCar = Car::instanceFromBasicData('Toyota', 'Corolla', 2020);
print_r($myCar->getProperties()).PHP_EOL;
print_r($myCar->make).PHP_EOL;
print_r($myCar->model).PHP_EOL;
print_r($myCar->year);


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

