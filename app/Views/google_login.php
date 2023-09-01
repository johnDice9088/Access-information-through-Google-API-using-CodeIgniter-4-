<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login with Google</title>
</head>
<body>
    <div style="text-align:center; margin-top:100px;">
        <h2>Welcome to My App</h2>
        <p>Please login with your Google account</p>
        <a href="<?= site_url('googleauth/login') ?>">
            <img src="https://developers.google.com/identity/images/btn_google_signin_light_normal_web.png" alt="Login with Google">
        </a>
    </div>
</body>
</html>
