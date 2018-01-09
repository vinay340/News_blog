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
            $sql = "SELECT a.title,a.description,a.content,a.img,a.date,a.id, a.created_date,a.category_id,b.category_name FROM news as a, category as b where a.category_id=b.id and status = 1 LIMIT $start, $perpage"; 
            $retval=mysqli_query($conn, $sql);
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
                                                <div class="col-md-2">
                                                <img src="Pictures/<?php echo $row['img']?>" alt="">
                                                </div>
                                                    <div class="col-md-10 col-xs-12">
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
                           <nav aria-label="Page navigation nav-justified">
                                <ul class="pagination">
                                    <?php if($curpage >= 2){ ?>
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                                    <?php } ?>
                                    <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                                    <?php if($curpage != $endpage){ ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                                    <?php }?>
                                </ul>
                            </nav>                              
                </div>
                    <?php 
                         include('public_view_rightmenu.php');
                    ?>
            </div>

    </body>
</html>
