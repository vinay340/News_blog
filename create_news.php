<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/author.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<?php
include ('mysql_conn.php');
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
        $query = "INSERT into `news` (title, description,content,date,approved_by,created_date)
VALUES ('$title','$description','$content','$date',CURDATE())";
        $result = mysqli_query($conn,$query) or die("Insert Error: ".mysqli_error($dbcon));
        if($result){
            echo "<div class='form'>
<h3>succesfully news updated.</h3>
<br/>Click here to <a href='author_dashboard.php'>Create another news</a></div>";
        }
    }else{
?>

    <div class="container">
        <div class="col-md-8 col-xs-12">
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
                
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Save to Drafts</label>   
                </div>
                <button type="submit" class="btn btn-default col-md-4 submit_button">CREATE</button>
                <button type="canel" class="btn btn-default col-md-4 cancel_button  right" href="author_dashboard.php" class="btn btn-default">CANCEL</button>

            </form>
        </div>
    </div>

    <?php } ?>
  
</body>
</html>