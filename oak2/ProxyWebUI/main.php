<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <style>
            form
            {
                text-align: center;
            }

            li a
            {
                font-size:18px;
            }

            h3 
            {
                color: blue;
                text-align: center;
            }
            table td, th, tr
            {
                color: #333;
                font-family: sans-serif;
                font-size: .9em;
                font-weight: 300;
                text-align: center;
                line-height: 25px;
                border: 0px solid navy;
                width: 800px;
            }
            th
            {
                height: 50px;
                border: 0px solid navy;
            }

            tr td
            {
                margin-left: auto;
                margin-right: auto;
            }

            div 
            {
                font-weight:bold;
            }
        </style>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- _______________________________[Start] Title Head_______________________________ -->
        <title>Proxy Server</title>
        <!-- ________________________________[End] Title Head________________________________ -->  
        
        <?php include ("./top_bar.php");?>
        <div class="row">

            <div class="col-lg-2">
                <?php include ("./free_inversenavbar.php");?>
            </div>

            <div class="col-lg-8">
                <?php include ("./top_bar.php");?>
            </div>

            <div class="col-lg-2">
                <?php include ("./free_inversenavbar.php");?>
            </div>
        </div>
        

        <div class="row">

            <div class="col-lg-1 col-lg-offset-2">
                <?php include ("./left_bar.php");?>
            </div>

            <div class="col-lg-7">
                <?php include ("./top_bar.php");?> <!-- For Test Only -->  
            </div>

        </div>
    </body>
</html>