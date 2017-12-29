<?php  
$host = 'localhost:3306';  
$user = 'root';  
$pass = 'root';  
$dbname = 'news_blog';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
 
//mysqli_close($conn);  


?>  
    <!-- include("mysql_conn.php");
     
     $sql = 'SELECT title,description,content,date,id FROM news';  
     $retval=mysqli_query($conn, $sql);  
       //$title = $id=$description=$content=$date="";
     
        
     
     /* while($row = mysqli_fetch_assoc($retval)){  
         $description=  $row['description'];
         $content= $row['content'];              
           $date=$row['date'];           
             $id=$row['id'];
          $title=$row['title'];
     echo $title."<br>";
     //echo "0 results";  
     } */ 
     
         ?> -->