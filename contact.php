<?php
// Url de zapier
$url = "https://hooks.zapier.com/hooks/catch/803715/o7cmtsm/";

// declaramos las varaibles con la data que recibimos del post
$nombre = $_POST["nombre"] ? $_POST["nombre"] : "";
$email = $_POST["email"] ? $_POST["email"] : "";
$telefono = $_POST["telefono"] ? $_POST["telefono"] : "";
$mensaje = $_POST["mensaje"] ? $_POST["mensaje"] : "";
$utm_source = $_POST["utm_source"] ? $_POST["utm_source"] : "";
$utm_medium = $_POST["utm_medium"] ? $_POST["utm_medium"] : "";
$utm_campaign = $_POST["utm_campaign"] ? $_POST["utm_campaign"] : "";
$utm_term = $_POST["utm_term"] ? $_POST["utm_term"] : "";
$utm_content = $_POST["utm_content"] ? $_POST["utm_content"] : "";

// Creamos un array con la data
$data = array(
    "nombre" => $nombre,
    "email" => $email,
    "telefono" => $telefono,
    "mensaje" => $mensaje,
    "utm_source" => $utm_source,
    "utm_medium" => $utm_medium,
    "utm_campaign" => $utm_campaign,
    "utm_term" => $utm_term,
    "utm_content" => $utm_content,
);

// Mandamos a zapier
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { }