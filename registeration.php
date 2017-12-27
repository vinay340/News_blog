<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>login form</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/login.css">

</head>
<style>

h2{
      padding: 0 75px 2px;                  
  }
</style>
<body>
<div class=" class container">
<?php
$errEmail = $errPass=$errName=$errPhone="";


if(isset($_POST["submit"])) {
$email = $_POST['email'];
$password = $_POST['password'];
$Name = $_POST['Name'];
$password = $_POST['phoneno'];


$valid=true;

// Check if email has been entered and is valid
if(empty($_POST['email'])){
$errEmail = '**Please enter a valid email address';
$valid=false;
}
if(empty($_POST['Name'])){
    $errName = '**Please enter a valid Name';
    $valid=false;
    }
    if(empty($_POST['phoneno'])){
        $errPhone = '**Please enter a valid Phone number';
        $valid=false;
        }
if(empty($_POST['password'])){
  $errPass = '**Please enter a valid password';
  $valid=false;
  }
//if(empty($_POST['password']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
//$errPass = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
//$valid=false;
//}
if($valid){
echo "The form has been submitted";
}
 
}
?>
<!-- end php code -->
<div class="wrapper">
<fieldset class="well col-md-6 " >
<form role="form-signin" class=" form-signin col-md-10 col-sm-12 c0l-xs-12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2 class="form-signin-heading heading"><p>REGISTER</p></h2>



  
<div class="form-group row">
        <div class=" inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input name="Name" placeholder="User Name" class="form-control" id="name" type="text">
     
        </div>
        <div class="err_msg"> <?php echo $errName;?> </div>
      </div>
    </div>

  
<div class="form-group row">
        <div class="inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input name="email" placeholder="E-Mail Address" class="form-control" id="inputEmail" type="email">
     
        </div>
        <div class="err_msg"> <?php echo $errEmail;?> </div>
      </div>
    </div>

      
<div class="form-group row">
        <div class="inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
      <input name="phoneno" placeholder="phone Number" class="form-control" id="phoneno" type="number">
     
        </div>
        <div class="err_msg"> <?php echo $errPhone;?> </div>
      </div>
    </div>

    <div class="form-group row">
        <div class="inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
           
        </div>
        <div class="err_msg">
            <?php echo $errPass; ?></div>
      </div>
    </div>

<!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
          
        </div> -->
<div class="form-group row">
<div class=" col-md-12 offset-sm-2 col-sm-10">
<input type="submit" value="REGISTER" name="submit" class="btn btn-primary">                           
</div>
</div>
</form>
</fieldset>
</div>
</div>
 
</body>
</html>