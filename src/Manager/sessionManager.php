<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//require_once '/repository/userIsOK.php';

function createSession($login, $password) {

    $_SESSION["connected"] = true;
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;

    return true;
}

function destroySession() {
    // empty data
    $_SESSION = array();

    // destroy session
    session_destroy();

    return true;
}

function isUserLoggedIn(){

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION["connected"])){
        return true;
    } else {
        return false;
    }
}
