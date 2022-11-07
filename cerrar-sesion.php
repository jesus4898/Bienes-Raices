<?php 

session_start();

//para cerrar la sesion

$_SESSION = [];

header('Location: /');

//var_dump($_SESSION);