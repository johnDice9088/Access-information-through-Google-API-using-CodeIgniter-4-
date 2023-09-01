<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login with Google in PHP</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Login using Google Account with PHP</h2>
   
   <?php if ($user): ?>
            <img src="<?= $user->picture ?>" alt="User profile image" width="100">
            <h3><?= $user->name ?></h3>
            <p><?= $user->email ?></p>
            <a href="<?= site_url('/') ?>">Logout</a>
        <?php else: ?>
            <p>You are not logged in. <a href="<?= site_url('home') ?>">Login with Google</a></p>
        <?php endif; ?>
  </div>
   </body>
</html>