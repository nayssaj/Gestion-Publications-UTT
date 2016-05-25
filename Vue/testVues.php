<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    require_once 'Vue.php';
    $vue = new Vue("Publication");
    $vue->generer('hello');


