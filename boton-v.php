<?php
session_start();

if (isset($_GET['logout'])) {
    unset($_SESSION['access_token']);
}

if (isset($_GET['code'])) {
    $tokenEndpoint = 'https://oauth2.googleapis.com/token';
    $clientId = '193105790800-u6no8333lauiolgrcnhinptr864612pi.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'https://anyel.top';

    $tokenRequestData = [
        'code' => $_GET['code'],
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'redirect_uri' => $redirectUri,
        'grant_type' => 'authorization_code',
    ];

    $tokenRequest = curl_init($tokenEndpoint);
    curl_setopt($tokenRequest, CURLOPT_POST, true);
    curl_setopt($tokenRequest, CURLOPT_POSTFIELDS, http_build_query($tokenRequestData));
    curl_setopt($tokenRequest, CURLOPT_RETURNTRANSFER, true);

    $tokenResponse = json_decode(curl_exec($tokenRequest), true);

    curl_close($tokenRequest);

    if (isset($tokenResponse['access_token'])) {
        $_SESSION['access_token'] = $tokenResponse['access_token'];

        // Obtener datos del usuario
        $userInfoEndpoint = 'https://www.googleapis.com/oauth2/v1/userinfo';
        $userInfoUrl = "$userInfoEndpoint?access_token={$tokenResponse['access_token']}";
        $userInfo = json_decode(file_get_contents($userInfoUrl), true);

        echo '<pre>';
        print_r($userInfo);
        echo '</pre>';
    }
} else {
    $authUrl = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query([
        'client_id' => 'TU_ID_DE_CLIENTE',
        'redirect_uri' => 'TU_URI_DE_REDIRECCION',
        'response_type' => 'code',
        'scope' => 'openid email profile',
    ]);

    echo "<a href='$authUrl'>Iniciar sesión con Google</a>";
}
?>
