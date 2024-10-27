<?php

interface Shape
{
    public function getArea ();
    public function getSides ();
    public function getPerimeter ();

}

class Shapes implements Shape
{
    public $sides;
    public $height;
    public $widht;
    public function __construct(int $sides, int $height, int $widht){
        $this->sides = $sides;
        $this->height = $height;
        $this->widht = $widht;
    }
    public function getArea (){
        return $this->height * $this->widht;
    }
    public function getSides() {
        return $this->sides;
    }
    public function getPerimeter (){
        return ($this->height + $this->widht) * 2;
    }
}