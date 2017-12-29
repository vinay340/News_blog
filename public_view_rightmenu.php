<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<?php
    include("mysql_conn.php");
     
$sql = 'SELECT category_name FROM category';  
$sql1='SELECT description FROM news';
$retval=mysqli_query($conn, $sql); 
$retval1=mysqli_query($conn, $sql1);  
 
 
    ?>
<body>
<div class="col-md-4 col-xs-4">
            <div >
                <h3 class="center">Recent-News</h3>
                <ul class="recent_news">
                <?php while($row1 =mysqli_fetch_assoc($retval1)) { ?>
                    <li> <?php echo $row1['description']?>
                    </li>
                <?php }?>   
                </ul>
            </div>
            <div >
                <h3 class="center">Category</h3>
                <ul class="recent_news">
                        <?php while($row =mysqli_fetch_assoc($retval)) { ?>
                    <li><?php echo $row['category_name']?></li>
                    
                    <?php }?>
                </ul>
            </div>
            <div >
                <h3 class="center">Archivese</h3>
                <ul class="recent_news">
                    <li>November(120)</li>
                    <li>December(110)</li>
                    <li>October(220)</li>
                </ul>
            </div>
        </div>  
</body>
</html>