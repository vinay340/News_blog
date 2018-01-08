<html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
        <title>Login</title>  
    </head>  
    <style>  
        .login-panel 
        {  
            margin-top: 150px;  
        }
    </style>  
    <body>  
        <?php
            session_start();//session starts here  
            include ('mysql_conn.php');
            // If form submitted, insert values into the database.
            if (isset($_POST['submit']))
            {
                    // removes backslashes
                $username = stripslashes($_POST['name']);
                    //escapes special characters in a string
                $username = mysqli_real_escape_string($conn,$username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($conn,$password);

                $sql_u = "SELECT * FROM user WHERE name='$username'and role_id ='3'";
                $res_u = mysqli_query($conn, $sql_u);
          
                if (mysqli_num_rows($res_u)> 0) {
                  echo '<div class="container">
                            <div class="alert alert-warning">
                                <h3>Sorry.. you are not approved user</h3>
                            </div>
                        </div>;';

                }else if(mysqli_num_rows($res_u)==0){
                    echo '<div class="container">
                    <div class="alert alert-danger">
                        <h3> you are not registered user please register </h3>
                    </div>
                </div>;';
                }
                $query = "SELECT * FROM `user` WHERE name='$username' and password='".md5($password)."' and role_id != '3'";
                $result = mysqli_query($conn,$query) or die(mysql_error());
                $rows = mysqli_num_rows($result);
                if($rows==0){
                    //$_SESSION['name'] = $username;
                    
                        // Redirect user to index.php
                   // header("Location: loginform.php");
                } else 
                    {             
                        while($row = mysqli_fetch_assoc($result))
                        {
                            session_regenerate_id();
                            $_SESSION['sess_user_id'] = $row['id'];
                            $_SESSION['sess_username'] = $row['name'];
                            $_SESSION['sess_userrole'] = $row['role_id'];
                            session_write_close();                
                        }   
                            if( $_SESSION['sess_userrole'] == 1){                        
                                    header('Location: admindashboard.php');
                                } else if( $_SESSION['sess_userrole'] == 2){
                                    header('Location: author_dashboard.php');
                                }
                    }   
            }
        ?> 
        <div class="container">  
            <div class="row">  
                <div class="col-md-4 col-md-offset-4">  
                    <div class="login-panel panel panel-success">  
                        <div class="panel-heading">  
                            <h3 class="panel-title">Log In </h3>  
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
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required  autofocus>  
                                    </div>  
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="submit" >  
                                </fieldset>  
                                Already User?<a href="registeration.php"> Register</a>
                            </form>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </body>         
</html>  
<?php  
    include("mysql_conn.php");  
    if(isset($_POST['login'])){  
        $user_email=$_POST['email'];  
        $user_pass=$_POST['password'];  
        $check_user="select * from user WHERE email='$user_email'AND password='$user_pass'";  
        $run=mysqli_query($conn,$check_user);  
        if(mysqli_num_rows($run)){  
            echo "<script>window.open('admindashboard.php','_self')</script>";  
            $_SESSION['email']=$user_email; 
        }  
        else  
        {  
        echo "<script>alert('Email or password is incorrect!')</script>";  
        }  
    }  
?>  