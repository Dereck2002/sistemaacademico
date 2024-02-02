<?php
require 'db_connection.php';

$question = $_POST['question'];

// Aquí puedes agregar la lógica para generar respuestas del chatbot
// Por ejemplo, podrías usar un arreglo asociativo que mapee preguntas a respuestas

// Utiliza consultas preparadas para evitar inyecciones SQL
$stmt = $conn->prepare("SELECT response FROM chatbot_responses WHERE question = ?");
$stmt->bind_param("s", $question);
$stmt->execute();
$stmt->bind_result($response);
$stmt->fetch();
$stmt->close();

if (empty($response)) {
    $response = "Lo siento, no entiendo esa pregunta.";
}

echo $response;

// Cierra la conexión a la base de datos
$conn->close();
?>
