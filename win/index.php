<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Proxy Login</title>
  <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>
  <section class="container">
   <p><img src="logo.png" width="359" height="110"></p>
    <p>&nbsp;</p>
    <p></p>
    <div class="login">
      <h1>Proxy Web Interface</h1>
      <form method="post" action="check_radius.php">
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="submit">
        <input type="submit" name="commit" value=" Login ">
        <input type="submit" name="regis" value="Sign up">
        </p>
      </form>
    </div>
</section>
</body>
</html>

