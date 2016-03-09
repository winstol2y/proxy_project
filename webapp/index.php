<?php
  session_start();
  include_once ('function.inc.php');
  if (isset($_POST['submit_B']) && $_POST['submit_B'] == "submit") 
  {
    $user=isset($_POST['username']) ? $_POST['username'] : "";
    $pass=isset($_POST['password']) ? $_POST['password']: "";
    $user = login($user,$pass);
    if (empty($user))
    {
      echo '<script type="text/javascript">alert("Login Fail");window.location.href = "index.php";</script>';
    }
    else
    {   
      $_SESSION['userD'] = $user;
      if($user["type"] == 0)
      {
        echo '<script type="text/javascript">alert("'."Hello ".$user["name"].'");window.location.href = "admin_info.php";</script>';
      }
      elseif ($user["type"] == 1) 
      {
        echo '<script type="text/javascript">alert("'."Hello ".$user["name"].'");window.location.href = "user_info.php";</script>';
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebStore</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">

      <form class="form-signin" action="index.php" method="POST">
        <h2 class="form-signin-heading">Store Log in</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="username" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="submit_B" value="submit" type="submit">Sign in</button>
      </form>

    </div>
  </body>
</html>

