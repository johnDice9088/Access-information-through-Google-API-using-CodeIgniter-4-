<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <div style="text-align:center; margin-top:50px;">
        <h2>Welcome to Your Dashboard</h2>

        <?php if ($user): ?>
            <img src="<?= $user->picture ?>" alt="User profile image" width="100">
            <h3><?= $user->name ?></h3>
            <p><?= $user->email ?></p>
            <a href="<?= site_url('googleauth/logout') ?>">Logout</a>
        <?php else: ?>
            <p>You are not logged in. <a href="<?= site_url('googleauth') ?>">Login with Google</a></p>
        <?php endif; ?>
    </div>
</body>
</html>
