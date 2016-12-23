<?php

class Rectangle
{
    private $width;
    private $height;

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }
}

class Square
{
    public function setWidth($width)
    {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
        $this->width = $height;
    }
}

$square = new Square();
$rectangle = new Rectangle();

class Controller
{
    public function setParallepiedeSize(Rectangle $parralepipede)
    {
        $parralepipede->setWidth(10);
        $parralepipede->setHeight(12);
    }
}
