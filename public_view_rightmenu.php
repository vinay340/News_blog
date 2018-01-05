<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <?php
        include("mysql_conn.php");
            
            $sql = 'SELECT category_name,id FROM category';  
            $sql1='SELECT id,title,created_date FROM news where status=1 ORDER BY created_date desc LIMIT 5'  ;
            $retval=mysqli_query($conn, $sql); 
            $retval2=mysqli_query($conn, $sql1);  
    ?>
    <body>
        <div class="col-md-3 col-xs-2 right">
            <div >
                <h3 class="center">Recent</h3>
                <ul class="recent_news">

                    <?php while($row2 =mysqli_fetch_assoc($retval2)) { ?>
                        <li><a href="news_view.php?id=<?php echo $row2['id']?>" ><?php echo $row2['title']?></a>
                        </li>
                    <?php }?>   

                </ul>
            </div>
            <div >
                <h3 class="center">Category</h3>
                <ul class="recent_news">
                    <?php while($row =mysqli_fetch_assoc($retval)) { ?>
                        <li><a href="category_view.php?c_id=<?php echo $row['id']?>"><?php echo $row['category_name']?></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>  
    </body>
</html>