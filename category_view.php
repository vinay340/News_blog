<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Public view</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .header1{
            text-transform: uppercase;
            text-align:center;
                }
        </style>
</head>
<body >
    <?php 
    include('public_view_header.php');
    include('mysql_conn.php');
    $c_id=$_GET['c_id'];
    $sql = "SELECT * FROM news where category_id=$c_id"; 
    $sql1 = "SELECT * FROM category where id=$c_id";
    $retval1=mysqli_query($conn, $sql1);
    $retval=mysqli_query($conn, $sql);
    ?>
    <div class="public_content">
        <?php while($row1 =mysqli_fetch_assoc($retval1)) { ?>
            <h1 class="header1"><?php echo $row1['category_name'] ?> News</h1>
        <?php }?>
        <?php if(mysqli_num_rows($retval) == 0){ ?>
            <div class="alert alert-warning">
              <strong>Sorry!</strong> Nothing to display
            </div>
        <?php }?>
        <div class= "container-fluid row">
            <div class="col-md-8 col-xs-8  ">
                <?php while($row =mysqli_fetch_assoc($retval)) { ?>
                 <fieldset class="content">
                    <div class="wrapper recent-updated"> 
                        <div id="upadtes-box" role="tabpanel" class="collapse show">
                            <ul class="news list-unstyled">
                                <li class="d-flex justify-content-between" > 
                                    <div class="left-col d-flex">
                                        
                                        <div class="col-md-12 col-xs-12">
                                            <div class="title">
                                                <strong><b class="n_date pull-right"><?php echo $row['created_date']?></b></strong>
                                                <strong><h3><b><?php echo $row['title']?></b></h3></strong>
                                            </div> 
                                            <p><b if="fogblack"><?php echo $row['date']?></b><br>
                                            <?php echo $row['description']?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <a class="right" href="news_view.php?id=<?php echo $row['id']?>" >View More....</a>
                </fieldset>
                <?php }?>
            </div>
            <?php 
            include('public_view_rightmenu.php');
            ?>
        </div>
    </div>
</body>
</html>
