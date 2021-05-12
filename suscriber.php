<?php
// Url de zapier
$url = "https://hooks.zapier.com/hooks/catch/803715/byqy7o3/";

// declaramos las varaibles con la data que recibimos del post
$suscriber_email = $_POST["suscriber_email"] ? $_POST["suscriber_email"] : "";
$utm_source = $_POST["utm_source"] ? $_POST["utm_source"] : "";
$utm_medium = $_POST["utm_medium"] ? $_POST["utm_medium"] : "";
$utm_campaign = $_POST["utm_campaign"] ? $_POST["utm_campaign"] : "";
$utm_term = $_POST["utm_term"] ? $_POST["utm_term"] : "";
$utm_content = $_POST["utm_content"] ? $_POST["utm_content"] : "";

// Creamos un array con la data
$data = array(
    "suscriber_email" => $suscriber_email,
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