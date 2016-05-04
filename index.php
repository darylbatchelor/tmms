<?php

$emailErr = "";
$successmsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "tmms";



$con = mysqli_connect($host, $db_user, $db_password, $db_name) or die("Could not connect to the database");



if (empty($_POST['email'])) {
  
  $emailErr = "You did not enter a valid email";
} else {
$email = test_input($_POST['email']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "You did not enter a valid email";
  
} else {

$date = date("Y") . "-" . date("m") . "-" . date("d");

$query = "INSERT INTO `subscribers` (`id`, `email`, `date`) VALUES (NULL, '$email', '$date');";

$result = mysqli_query($con, $query);

if ($result) {
  $successmsg = "You have been added to our subscriber list!";
}

}


}



}


function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;

}


?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>The Marriage Mojo Show</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet"href="css/jquery.countdown.css">
        <link rel="stylesheet" href="css/main.css">

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron color-scheme">
      <div class="container jumbowrapper">
        <img  class="logo" src="img/logo.png">
        <br>
        <h1>We are coming soon!</h1>
        
      </div>
    </div>


      <!-- Main content area -->
      <div class="row">
        <div class="col-xs-12  counter">
          <div id="countdown"></div>
        </div>
        <div class="col-xs-12 main-content-area">
          <!-- need to add php code here -->
          <h1>Subscribe To Get Notified</h1>
          <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
              <label class="sr-only" for="subscribe">Email address</label>
              <input type="email" name="email" class="form-control" id="subscribe" placeholder="Enter your email">
            </div>
           
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <h2 class="successmsg"><?php echo $successmsg; ?></h2>
          <h2 class="emailErr"><?php echo $emailErr; ?></h2>
       </div>
        
      </div>

      <footer>
        <div class="container"><p>&copy; Batchelor 2016</p></div>

        
      </footer>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.js"></script>
        <script src="js/vendor/jquery.plugin.min.js"></script>
        <script src="js/vendor/jquery.countdown.min.js"></script>
        <script src="js/main.js"></script>
          <script>
          var favourdate = new Date();
          //need to insert php code here to change date
          favourdate.setFullYear(2016, 7, 5);
          favourdate.setHours(18);
          favourdate.setMinutes(00);
          favourdate.setSeconds(00);
          $('#countdown').countdown({until: favourdate});
        </script>
        

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script> -->
    </body>
</html>
