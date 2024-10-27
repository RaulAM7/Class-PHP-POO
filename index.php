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
    protected static function instanceFromBasicData(string $make, string $model, int $year): static
    {
        $newCar = new static($make, $model, $year);
        return $newCar;
    }
    protected static function instanceFromArray(array $arr): static 
    {
        $data = $arr;
        return new static ($data['make'], $data['model'], $data['year']);

    }
    protected static function instanceFromJson(string $json): static
    {
        $data = json_decode($json, true);
        return new static ($data['make'], $data['model'], $data['year']);
    }
    protected static function instanceFromXml(string $xml): static
    {
        //define convert_xml_to_array($xml), la siguiente linea es $data = convert_xml_to_array($xml)
        $data = $xml;
        return new static ($data['make'], $data['model'], $data['year']);
    }
    public static function create($source, ...$args): static 
    {
        if (count($args) === 2) {
            return self::instanceFromBasicData($source, $args[0], $args[1]);
        }
        if (is_array($source)) {
            return self::instanceFromArray($source);
        }
        if (is_string($source)) {
            $jsonData = json_decode($source, true);
            if ($jsonData !== null) {
                return self::instanceFromJson($source);
            }
        }
        throw new \InvalidArgumentException('Invalid parameters');
    }
}
$myCar = Car::create('Toyota', 'Corolla', 2020);
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


// Probando a extender clases
class CarHijo extends Car 
{
    protected $propiedadCarHijo = 'constant';

    public function __construct(string $make, string $model, int $year)
    {
        parent::__construct($make, $model, $year);
    }
}

$newCarHijo = CarHijo::create('Tesla', 'Model X', 2020);
print_r($newCarHijo->getProperties());

// Abstract classes

abstract class Vehicles
{
    protected $ruedas;
    protected $alto;
    protected $ancho;
    protected $peso;

    public function __construct(int $ruedas, int  $alto, int $ancho, int $peso)
    {
        $this->ruedas = $ruedas;
        $this->alto = $alto;
        $this->ancho = $ancho;
        $this->peso = $peso;
    }
    abstract function arrancar();
    abstract function getProperties();
    abstract function instantiate();
    abstract function acelerar();
    abstract function frenar();
    
}