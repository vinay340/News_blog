<!DOCTYPE html>
<html>
    <head>
        <title>Author Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/admin_ref.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php 
            include('adminheader.php');
            include("author_auth.php");
            $a= $_SESSION['sess_user_id'];
            $sql = "SELECT title,description,content,date,id, created_date,status FROM news WHERE author_id = $a ORDER BY created_date DESC";  
            $sql1 = "SELECT a.title,a.description,a.content,a.date,a.id,b.name,a.created_date FROM news AS a, user AS b WHERE a.author_id != $a  && a.author_id=b.id";  

            $retval=mysqli_query($conn, $sql);
            $retval1=mysqli_query($conn, $sql1); 
        ?>
        <div class="container-fluid">
            <div class="wrapper a_header">
                <div class="col-md-12 col-sm-12 col-xs-12 row ">     
                    <div class="col-md-4 col-xs-12 " id="right">
                    </div>
                </div>
                <div class="tab">
                    <ul class="nav nav-pills nav-justified" id="tab1">
                        <li class="col-md-6 active" ><a  data-toggle="pill"  href="#me">Posts by me</a></li>
                        <li class="col-md-6"><a  data-toggle="pill"  href="#others">Posts by others</a></li>
                        <li class="col-md-6">  <a href="#create_news" data-toggle="pill">CREATE NEWS</a></li>
                    </ul>
                    <div class="tab-content" >
                        <div id="me" class="tab-pane fade in active">
                            <h2 class="text-center">My Posts</h2>
                            <?php while($row = mysqli_fetch_assoc($retval)){?>
                            <fieldset class=" container well">
                                <div class="wrapper recent-updated"> 
                                    <div id="upadtes-box" role="tabpanel" class="collapse show">
                                        <ul class="news list-unstyled">
                                            <li class="d-flex justify-content-between" > 
                                                <div class="left-col d-flex">
                                                    <div class="row">
                                                        <div class="title col-md-10">
                                                            <strong><h3><?php echo $row['title']?></h3></strong>
                                                        </div> 
                                                        <div class="col-md-2" id="right">
                                                            <a href="edit_news.php?id= <?php echo $row['id']?>  ">
                                                                <button type="submit"id="right" class="fa fa-pencil-square-o " aria-hidden="true">&nbsp;</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <b id="right"><?php echo $row['created_date']?></b><br>
                                                    <p id="right"> STATUS: <?php echo $row['status']?></p>
                                                    <div class="col-md-10 col-xs-12">
                                                        <p><b><?php echo $row['date']?></b><br>             
                                                            <?php echo $row['description']?><br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </fieldset>
                            <?php }?>
                        </div>
                        <div id="others" class="tab-pane fade">
                            <h2 class="text-center">Other Posts</h2>
                            <?php while($row1  = mysqli_fetch_assoc($retval1)){?>
                            <fieldset class=" container well">
                                <div class="wrapper recent-updated"> 
                                    <div id="upadtes-box" role="tabpanel" class="collapse show">
                                        <ul class="news list-unstyled">
                                            <li class="d-flex justify-content-between" > 
                                                <div class="left-col d-flex">
                                                    <div class="row">
                                                        <div class="title col-md-10">
                                                            <strong><h3><?php echo $row1['id']?>.<?php echo $row1['title']?></h3></strong>
                                                        </div> 
                                                        <div class="col-md-2" id="right">
                                                            <a href="edit_news.php?id= <?php echo $row1['id']?>  ">
                                                                <button type="submit"id="right" class="fa fa-pencil-square-o " aria-hidden="true">&nbsp;</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <b id="right"><?php echo $row1['created_date']?></b><br>
                                                    <div class="col-md-10 col-xs-12">
                                                        <p><b><?php echo $row1['date']?></b><br>             
                                                            <?php echo $row1['description']?><br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </fieldset>
                            <?php }?>
                        </div>
                        <div id="create_news" class="tab-pane fade">
                            <?php
                            // If form submitted, insert values into the database.
                                if (isset($_POST['title'])){
                                    $title=$_REQUEST['title'];
                                    $description=$_REQUEST['description'];
                                    $content=$_REQUEST['content'];
                                    $date=$_REQUEST['date'];
                                    $title = mysqli_real_escape_string($conn,$title); 
                                    $description = mysqli_real_escape_string($conn,$description);
                                    $content = mysqli_real_escape_string($conn,$content);
                                    $date = mysqli_real_escape_string($conn,$date);
                                    //$trn_date = date("Y-m-d H:i:s");
                                    $query = "INSERT into `news` (title, description,content,date, author_id,created_date)
                                    VALUES ('$title','$description','$content','$date', '$a' , CURDATE())";
                                    $result = mysqli_query($conn,$query) or die("Insert Error: ".mysqli_error($conn));
                                    if($result){
                                        echo "<div class='form text-center'>    
                                        <h3>succesfully news updated.</h3>";
                                    }
                                }
                            ?>
                            <div class="container">
                                <fieldset class="well">
                                    <div class="col-md-6 col-xs-12 top">
                                        <h2 class="text-center">Create Post</h2>
                                        <form action="" method="post" name="create_news">
                                            <div class="form-group">
                                                <input type="text"class="form-control" id="title" placeholder="Title" name="title" required  autofocus>
                                            </div>
                                            <div class="form-group">
                                                <textarea type="Description" class="form-control" id="description" placeholder="Description" name="description" required  autofocus></textarea>
                                            </div>
                                            <div class="form-group">
                                                <textarea type="Content" class="form-control" id="content" placeholder="Content" name="content" required  autofocus></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control" id="content" placeholder="Event date" name="date" required  autofocus>
                                            </div>
                                            <button type="submit" class="btn btn-primary col-md-4 submit_button">CREATE</button>
                                            <a class="btn btn-warning col-md-4 cancel_button  right" href="author_dashboard.php" >CANCEL</a>
                                        </form>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>