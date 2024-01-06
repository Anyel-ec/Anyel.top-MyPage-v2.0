<?php
require_once __DIR__ . '/vendor/autoload.php';
var_dump($_ENV);
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Google_Client();
$client->setClientId(getenv('GOOGLE_CLIENT_ID'));
$client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));

// Imprime la URI de redirección para depuración
$redirectUri = (string) getenv('GOOGLE_REDIRECT_URI');
echo "Google Redirect URI: $redirectUri\n";

$client->setRedirectUri($redirectUri);
$client->addScope('email');
$client->addScope('profile');

// Resto de tu código aquí
