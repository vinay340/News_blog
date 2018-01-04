<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/admin_ref.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<?php
    include('adminheader.php');

include ('mysql_conn.php');
include("auth.php");
$a =$_SESSION['sess_user_id'];
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
            echo " <div class='alert alert-success'>
            <strong>Successfully created!!!</strong> Click here to <a href='author_dashboard.php'>view</a></div>
          </div> ";
        }
    }
?>

    <div class="container-fluid">
        <div class="top">
        <div class="col-md-8 col-xs-12 top">
            <h2 class="caption">CREATE NEWS</h2>
            <form action="" method="post" name="create_news">
                <div class="form-group">
                    <input type="text"class="form-control" id="title" placeholder="Title" name="title">
                 </div>
                <div class="form-group">
                    <textarea type="Description" class="form-control" id="description" placeholder="Description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <textarea type="Content" class="form-control" id="content" placeholder="Content" name="content"></textarea>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="content" placeholder="Event date" name="date">
                </div>
                
               
                <button type="submit" class="btn btn-default col-md-4 submit_button">CREATE</button>
                <a class="btn btn-default col-md-4 cancel_button  right" href="author_dashboard.php" >CANCEL</a>

            </form>
        </div>
    </div>
    </div>
  
</body>
</html>