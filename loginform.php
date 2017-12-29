<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>login form</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class=" class container">
<?php
$errEmail = $errPass="";
if(isset($_POST["submit"])) {

 
$email = $_POST['email'];
$password = $_POST['password'];
$valid=true;

// Check if email has been entered and is valid
if(empty($_POST['email'])){
$errEmail = '**Please enter a valid email address';
$valid=false;
}
if(empty($_POST['password'])){
  $errPass = '**Please enter a valid password';
  $valid=false;
  }

if($valid){
echo "The form has been submitted";
}
 
}
?>

<div class="wrapper">
<fieldset class="well col-md-10 " >
<form role="form-signin" class=" form-signin col-md-10 col-sm-12 c0l-xs-12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2 class="form-signin-heading">Log in</h2>


  
<div class="form-group row">
        <div class=" inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input name="email" placeholder="E-Mail Address" class="form-control" id="inputEmail" type="email">
     
        </div>
        <div class="err_msg"> <?php echo $errEmail;?> </div>
      </div>
    </div>

    <div class="form-group row">
        <div class=" inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
           
        </div>
        <div class="err_msg">
            <?php echo $errPass; ?></div>
      </div>
    </div>

<div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
          
        </div>
<div class="form-group row">
<div class=" col-md-12 offset-sm-2 col-sm-10">
<a href="admindashboard.php" type="submit" value="Log in" name="submit" class="btn btn-primary">LOG IN</a>
</div>
</div>
<a href="registeration.php" class="<col-md-12></col-md-12> col-sm-12 col-xs-12">Are you new user?  Register here...</a> 
<a href="" class="col-md-12 col-sm-12 col-xs-12">FOrget password ?  Click here to Reset...</a> 

</form>
</fieldset>
</div>
</div>

 
</body>
</html>