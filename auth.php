<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);
$client->addScope('email');
$client->addScope('profile');

session_start();

if (isset($_GET['logout'])) {
    unset($_SESSION['access_token']);
}

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $_SESSION['access_token'] = $token;
    header('Location: ' . filter_var($client->getRedirectUri(), FILTER_SANITIZE_URL));
}

if (!isset($_SESSION['access_token']) || !$_SESSION['access_token']) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
    exit; // Asegurarse de que el script se detenga después de la redirección
}

// Resto del código para cuando el usuario ya está autenticado
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $oauth = new Google_Service_Oauth2($client);
    $userData = $oauth->userinfo->get();

    $_SESSION['user_name'] = $userData->getName();
}

?>
