<?php

    function conectar(){

        $username ="root";
        $password ="";
        $hostnames="localhost";
        $dbname="ctrl_conttento_zen";
        $mysqli= new mysqli($hostnames,$username,$password,$dbname) or die("ERROR AL CONECTAR".mysql_error());
        $mysqli->set_charset("utf8");

      return $mysqli;

    }

 ?>