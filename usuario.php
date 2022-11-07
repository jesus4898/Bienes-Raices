<?php 
//importar la conexion

require 'includes/config/database.php';
$db = conectarDB();


//crear un email y password

$email = "correo@correo.com";
$password = "123456";


//para hashear el password
//forma que ya no se usa
//var_dump(md5($password));, genera el mismo codigo encriptado, 

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
//ESTA GENERA UN HASH diferente

// $passwordHash = password_hash($password, PASSWORD_BCRYPT);
//otra forma similar

//query para crear el usuario

$query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";

// echo $query;

// exit;

//agregarlo a la base de datos

mysqli_query($db, $query);



?>