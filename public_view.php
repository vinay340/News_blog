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
            $perpage =3;			;
            if(isset($_GET['page']) & !empty($_GET['page'])){
                $curpage = $_GET['page'];
            }else{
                $curpage = 1;
            }
            $start = ($curpage * $perpage) - $perpage;
            $PageSql = "SELECT * FROM `news`";
            $pageres = mysqli_query($conn, $PageSql);
            $totalres = mysqli_num_rows($pageres);

            $endpage = round($totalres/$perpage);                           
            $startpage = 1;
            $nextpage = $curpage + 1;
            $previouspage = $curpage - 1;
         
                $sql = "SELECT a.title,a.description,a.content,a.date,a.id, a.created_date,a.category_id,b.category_name,a.image FROM news as a, category as b where a.category_id=b.id and status = 1  LIMIT $start, $perpage"; 
                $sql2 = "SELECT title,description,content,date,id, created_date,image FROM news where status = 1 limit 5";  
                
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
                                    <div class="col-md-2 col-xs-2">
                                        <img src="assets/images/<?php echo $row['image'] ?>" width="100px" height="100px"alt="">
                                    </div>
                                    <div class="col-md-10 col-xs-10">
                                        <div class="title">
                                        <strong><b class="n_date pull-right"><?php echo $row['created_date']?></b></strong>
                                        <strong><h3><b><?php echo $row['title']?></b></h3></strong>
                                        </div> 
                                        <p><b><?php echo $row['date']?></b><br>
                                            <?php echo $row['description']?>
                                        </p>
                                    </div>
                                </div>
                             <div><p class="pull-left"><b> Category : </b><?php echo $row['category_name'] ?></p><a class="pull-right" href="news_view.php?id=<?php echo $row['id']?>" >View More....</a></div>
                        </fieldset>
                    <?php }?>
                           <nav aria-label="Page navigation nav-justified">
                                <ul class="pagination">
                                    <?php if($curpage >= 2){ ?>
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo "prev" ?></a></li>
                                    <?php } ?>
                                    <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                                    <?php if($curpage != $endpage){ ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo "next" ?></a></li>
                                    <?php }?>
                                </ul>
                                <p class="pull-right">&laquo;PAGE : <?php echo $curpage ?>/<?php echo $endpage ?>&raquo;</p>
                            </nav>                              
                    
                    <?php while($row2 =mysqli_fetch_assoc($retval2)) { ?>
                        <div class="col-md-2 col-xs-12  ">
                            <a href="news_view.php?id=<?php echo $row2['id']?>" >
                            <img src="assets/images/<?php echo $row2['image'] ?>" width="100px" height="100px"alt="">
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
