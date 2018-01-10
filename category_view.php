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
    $Categoryid="";
    $perpage =3;			;
    if(isset($_GET['page']) & !empty($_GET['page'])){
        $curpage = $_GET['page'];
    }else{
        $curpage = 1;
    }
    $start = ($curpage * $perpage) - $perpage;
    $PageSql = "SELECT * FROM `news` where category_id=$c_id    ";
    $pageres = mysqli_query($conn, $PageSql);
    $totalres = mysqli_num_rows($pageres);
    $endpage = round($totalres/$perpage);   
    $startpage = 1;
    $nextpage = $curpage + 1;
    $previouspage = $curpage - 1;

    $sql = "SELECT * FROM news where category_id=$c_id LIMIT $start, $perpage"; 
    $sql1 = "SELECT * FROM category where id=$c_id ";
    $retval=mysqli_query($conn, $sql);
    $retval1=mysqli_query($conn, $sql1);
    ?>
    <div class="public_content">
        <?php while($row1 =mysqli_fetch_assoc($retval1)) { 
            $Categoryid=$row1['id']?>
            <h1 class="header1"><?php echo $row1['category_name'] ?> News</h1>
        <?php }?>
        <div class= "container-fluid row">
            <div class="col-md-8 col-xs-8  ">
        <?php if(mysqli_num_rows($retval) == 0){ ?>
            <div class="alert alert-warning">
              <strong>Sorry!</strong> Nothing to display
            </div>
        <?php }?>
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
                <?php } ?>
                <?php if (mysqli_num_rows($pageres)>3){?>
                    <nav aria-label="Page navigation nav-justified">
                        <ul class="pagination">
                            <?php if($curpage >= 2){ ?>
                            <li class="page-item"><a class="page-link" href="?c_id=<?php echo $Categoryid?>&page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                            <?php } ?>
                            <li class="page-item active"><a class="page-link" href="?c_id=<?php echo $Categoryid?>&page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                            <?php if($curpage != $endpage){ ?>
                                <li class="page-item"><a class="page-link" href="?c_id=<?php echo $Categoryid?>&page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                            <?php }?>
                        </ul>
                    </nav>  
                <?php }?>
            </div>
            <?php 
            include('public_view_rightmenu.php');
            ?>
        </div>
    </div>
</body>
</html>
