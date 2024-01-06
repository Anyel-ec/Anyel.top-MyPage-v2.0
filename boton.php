<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Google_Client();
$client->setClientId(getenv('GOOGLE_CLIENT_ID'));
$client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));

// Asegúrate de que el valor sea tratado como una cadena
$client->setRedirectUri((string) getenv('GOOGLE_REDIRECT_URI'));

$client->addScope('email');
$client->addScope('profile');



if (isset($_GET['logout'])) {
    unset($_SESSION['access_token']);
}

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $_SESSION['access_token'] = $token;
    header('Location: ' . filter_var($client->getRedirectUri(), FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $oauth = new Google_Service_Oauth2($client);
    $userData = $oauth->userinfo->get();

    echo '<pre>';
    print_r($userData);
    echo '</pre>';
} else {
    $authUrl = $client->createAuthUrl();
    echo "<a href='$authUrl'>Iniciar sesión con Google</a>";
}
?>
