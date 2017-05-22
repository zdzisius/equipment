<?php

/*
$tablica = array(5,2,6);

$i = 2;

echo $tablica[$i];
*/


class Tablica {

    private $tablica = array(5,2,6);

    function __construct() {

        $i = 1;
        echo $this->tablica[$i];

    }

}


$obj = new Tablica();




?>