<?php

class Whatever
{
    public function removeFirstEl(array &$array)
    {
        unset($array[0]);
    }
}

$wat = new Whatever();
$var = ['apple', 'pear'];
var_dump($var);
$wat->removeFirstEl($var);

var_dump($var);
