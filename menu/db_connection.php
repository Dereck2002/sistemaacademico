<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registroacademico";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

?>
