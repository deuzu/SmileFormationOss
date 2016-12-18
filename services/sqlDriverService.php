<?php

    function getDatabaseConnection(){
        $user = 'root';
        $pass = 'root';
        $bdd = 'FormationOSS';

        return new PDO('mysql:host=localhost;dbname='.$bdd, $user, $pass);
    }
