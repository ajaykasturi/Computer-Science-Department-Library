<?php

$APIKEY = "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";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = $_POST['prompt'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer '.$APIKEY,
    ]);
    $data = array(
        "model" => "text-davinci-003",
        "prompt" =>$query,
        "max_tokens" => 100,
        "temperature" => 0.2
    );
    $json_data = json_encode($data);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

    $response = curl_exec($ch);
    echo json_encode($response);
    curl_close($ch);
}
?>