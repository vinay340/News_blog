<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Public view</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
    
?>
<body >
    <?php 
    include('public_view_header.php');
    include('mysql_conn.php');
$sql = 'SELECT title,description,content,date,id, created_date FROM news';  

$retval=mysqli_query($conn, $sql);
 
    ?>
    <div class="public_content">
        <hr>
        <marquee behavior="scroll">Important news text goes here <sup><span class="bubble">new</span></sup></marquee>
        <hr>   
        <div class=row>
            <div class="col-md-8 col-xs-8 ">
                <?php while($row =mysqli_fetch_assoc($retval)) { ?>

                <fieldset class="content">
                    <div class="wrapper recent-updated"> 
                        <div id="upadtes-box" role="tabpanel" class="collapse show">
                            <ul class="news list-unstyled">
                                <li class="d-flex justify-content-between" > 
                                    <div class="left-col d-flex">
                                        <div class="title">
                                            <strong><h3><?php echo $row['title']?><b class="n_date"><?php echo $row['created_date']?></b></h3></strong>
                                        </div> 
                                        <div class="col-md-2 col-xs-12">
                                            <img  class ="img1" src="assets/images/download.jpeg">
                                        </div>
                                        <div class="col-md-10 col-xs-12">
                                             <a class="alink"  href="news_view.php">
                                            
                                            <p><b><?php echo $row['date']?>,Bengaluru.</b><br>

                                            <?php echo $row['description']?>
                                            </p>
                                                 </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </fieldset> 
                <?php }?>
               
                <div class="col-md-2 col-xs-12">
                    <img class ="img1"src="assets/images/download.png">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                    vulputate eu pharetra nec, mattis ac neque.
                    </p>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img class ="img1"src="assets/images/download.png">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                    vulputate eu pharetra nec, mattis ac neque.
                    </p>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img class ="img1"src="assets/images/download.png">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                    vulputate eu pharetra nec, mattis ac neque.
                    </p>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img class ="img1"src="assets/images/download.png">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                    vulputate eu pharetra nec, mattis ac neque.
                    </p>
                </div>  
            </div>
            <?php 
            include('public_view_rightmenu.php');
            ?>
        </div>
    </div>
</body>
</html>
