<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>login form</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
<?php
$errEmail = $errPass= $errName="";
if(isset($_POST["submit"])) {
  
 
$email = $_POST['email'];
$name = $_POST['user'];
$password = $_POST['password'];
$valid=true;
// Check if name has been entered
if(empty($_POST['user'])){
$errName= 'Please enter your user name';
$valid=false;
}
// Check if email has been entered and is valid
if(empty($_POST['email'])){
$errEmail = 'Please enter a valid email address';
$valid=false;
}
// check if a valid password has been entered
if(empty($_POST['password']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
$errPass = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
$valid=false;
}
if($valid){
echo "The form has been submitted";
}
 
}
?>
<!-- end php code -->
<fieldset class="well" >
<form role="form-signin" class="col-md-6 col-sm-6 c0l-xs-12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2 class="form-signin-heading">Please sign in</h2>
<div class="form-group row ">
<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control "  id="inputEmail" name="email" placeholder="Email">
<?php echo $errEmail;?>
</div>
</div>
<div class="form-group row">
    <label for="inputUser" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
         <input type="text" class="form-control" id="inputUser" name="user" placeholder="Username">
            <?php echo $errName; ?>
        </div>
</div>
<div class="form-group row">
<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
<?php echo $errPass; ?>
</div>
</div>

<div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
          
        </div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<input type="submit" value="Sign in" name="submit" class="btn btn-primary"/>
</div>
</div>
</form>
</fieldset>
</div>

 
</body>
</html>