<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Public view</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body >
        <?php 
            include('public_view_header.php');
            include('mysql_conn.php');
                $sql = 'SELECT a.title,a.description,a.content,a.date,a.id, a.created_date,a.category_id,b.category_name FROM news as a, category as b where a.category_id=b.id and status = 1 ORDER BY created_date DESC'; 
                $sql2 = 'SELECT title,description,content,date,id, created_date FROM news where status = 1 limit 5';  
                
                $retval=mysqli_query($conn, $sql);
                $retval2=mysqli_query($conn, $sql2);
        ?>
        <div class="public_content">
            <div class= "container-fluid row">
                <div class="col-md-9 col-xs-8  ">
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
                                                        <p><b><?php echo $row['date']?></b><br>
                                                            <?php echo $row['description']?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                             <div><p class="pull-left"><b> Category : </b><?php echo $row['category_name'] ?></p><a class="pull-right" href="news_view.php?id=<?php echo $row['id']?>" >View More....</a></div>
                        </fieldset>
                    <?php }?>
                    
                    <?php while($row2 =mysqli_fetch_assoc($retval2)) { ?>
                        <div class="col-md-2 col-xs-12  ">
                            <a href="news_view.php?id=<?php echo $row2['id']?>" >
                            </a>
                            <p> <?php echo $row2['title'];?></p>
                        </div>
                    <?php }?>
                </div>
                    <?php 
                         include('public_view_rightmenu.php');
                    ?>
            </div>

    </body>
</html>
