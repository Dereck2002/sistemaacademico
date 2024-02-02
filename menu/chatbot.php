<?php
require 'db_connection.php';

$question = $_POST['question'];

// Utiliza consultas preparadas para evitar inyecciones SQL
$stmt = $conn->prepare("SELECT response FROM chatbot_responses WHERE question = ?");
$stmt->bind_param("s", $question);
$stmt->execute();
$stmt->bind_result($response);
$stmt->fetch();
$stmt->close();

// Si no hay una respuesta predefinida en la base de datos, utiliza OpenAI para generar una respuesta
if (empty($response)) {
    // Llama a la función que interactúa con OpenAI
    $response = getOpenAIResponse($question);
}

echo $response;

// Cierra la conexión a la base de datos
$conn->close();

// Función para obtener respuesta de OpenAI
function getOpenAIResponse($question) {
    $openai_api_key = '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';  // Reemplaza con tu propia clave API de OpenAI

    $openai_endpoint = 'https://api.openai.com/v1/engines/davinci-codex/completions';
    $openai_headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $openai_api_key,
    ];

    $openai_data = [
        'prompt' => $question,
        'max_tokens' => 100,
    ];

    $ch = curl_init($openai_endpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($openai_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $openai_headers);

    $response = curl_exec($ch);
    curl_close($ch);

    $decoded_response = json_decode($response, true);

    return isset($decoded_response['choices'][0]['text']) ? $decoded_response['choices'][0]['text'] : "Error al obtener respuesta de OpenAI.";
}
?>
