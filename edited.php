<?php
    include ('mysql_conn.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['title'])){
        $title=$_REQUEST['title'];
        $ID=$_REQUEST['id'];
        $description=$_REQUEST['description'];
        $content=$_REQUEST['content'];
        $date=$_REQUEST['date'];
        
        $title = mysqli_real_escape_string($conn,$title); 
        $description = mysqli_real_escape_string($conn,$description);
        $content = mysqli_real_escape_string($conn,$content);
        $date = mysqli_real_escape_string($conn,$date);
        $ID = mysqli_real_escape_string($conn,$ID);
        $query = "UPDATE news  SET title ='$title', description= '$description',content='$content',date='$date' ,created_date=CURDATE(),status=0  WHERE id = $ID";
        $result = mysqli_query($conn,$query) or die("Insert Error: ".mysqli_error($conn));
        if($result){
            echo "<script>window.open('author_dashboard.php?editid=edited&editmsg=Edited successfully','_self')</script>";
  
        }
    }
?>