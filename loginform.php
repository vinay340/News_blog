<?php  
session_start();//session starts here  
  
?>  
  
  
  
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Login</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }
</style>  
  
<body>  
<?php
include ('mysql_conn.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['name'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($conn,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE name='$username'
and password='".md5($password)."'";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    
    $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['name'] = $username;
        $_SESSION['id'] = $result['id'];
        
            // Redirect user to index.php
	    header("Location: admindashboard.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='loginform.php'>Login</a></div>";
	}
    }else{
?> 
  
<div class="container">  
    <div class="row">  
        <div class="col-md-4 col-md-offset-4">  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Log In</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="loginform.php">  
                        <fieldset>  
                            <div class="form-group input-group"  > 
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="form-control"  type="text" name="name" placeholder="Username" required  autofocus>  
                            </div>  
                            <div class="form-group input-group">  
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">  
                            </div>  
  
  
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="submit" >  
  
                            <!-- Change this to a button or input when using this as a form -->  
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->  
                        </fieldset>  
                        Already User?<a href="registeration.php"> Register</a>
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
<?php } ?> 
  
</body>  
  
</html>  
  
<?php  
  
include("mysql_conn.php");  
  
if(isset($_POST['login']))  
{  
    $user_email=$_POST['email'];  
    $user_pass=$_POST['password'];  
  
    $check_user="select * from user WHERE email='$user_email'AND password='$user_pass'";  
  
    $run=mysqli_query($conn,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
        echo "<script>window.open('admindashboard.php','_self')</script>";  
  
        $_SESSION['email']=$user_email; 
  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  
}  
?>  