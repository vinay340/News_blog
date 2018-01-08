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
        <?php
         include ('mysql_conn.php');
            // If form submitted, insert values into the database.
            if (isset($_POST['name']))
            {
                    // removes backslashes
                $username = stripslashes($_REQUEST['name']);
                    //escapes special characters in a string
                $username = mysqli_real_escape_string($conn,$username); 
                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($conn,$email);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($conn,$password);
                $sql_u = "SELECT * FROM user WHERE name='$username'";
                $sql_e = "SELECT * FROM user WHERE email='$email'";
                
                $res_u = mysqli_query($conn, $sql_u);
                $res_e = mysqli_query($conn, $sql_e);
                
          
                if (mysqli_num_rows($res_u) > 0) {
                  echo '<div class="container">
                            <div class="alert alert-warning">
                                <h3> SORRY... username already taken please try another</h3>
                            </div>
                        </div>;';

                } else if (mysqli_num_rows($res_e) > 0) {
                  echo '<div class="container">
                            <div class="alert alert-warning">
                                <h3> SORRY... email exits</h3>
                            </div>
                        </div>;';

                } else{
                
                $query = "INSERT into `user` (name, email, password) VALUES ('$username', '$email','".md5($password)."')";
                $result = mysqli_query($conn,$query) or die("Insert Error: ".mysqli_error($conn));
                echo '<div >
                        <div class="alert alert-success">
                            <h3>Registration successfully completed</h3>
                        </div>
                    </div>;';
                }
            }
                ?>

                    <div class=" class container">
                        <div class="wrapper">
                            <fieldset class="well col-md-6 " >
                                <form role="form-signin" class=" form-signin col-md-10 col-sm-12 c0l-xs-12" method="post" action="registeration.php"  name="registration" >
                                    <h2 class="form-signin-heading heading"><p>REGISTER</p></h2>

                                    <div class="form-group row" > 
                                    
                                        <div class=" inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input name="name" placeholder="User Name" class="form-control" id="name" type="text" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input name="email" placeholder="E-Mail Address" class="form-control" id="inputEmail" type="email" required />
                                            </div>
                                        </div>
                                    </div>

                                

                                    <div class="form-group row">
                                        <div class="inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required />
                                             </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class=" col-md-12 offset-sm-2 col-sm-10">
                                            <input type="submit" value="Register" name="submit" class="btn btn-primary">                           
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
    </body>
</html>