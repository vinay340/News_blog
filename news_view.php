<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NEWS_VIEW</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php 
    include('public_view_header.php');
    include('mysql_conn.php');
$sql = 'SELECT title,description,content,date,id, created_date FROM news';  

$retval=mysqli_query($conn, $sql);
 
    ?>
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
                                    <div class="row">
                                        <div class="col-md-2 col-xs-12">
                                            <img  class ="img1" src="assets/images/download.jpeg">
                                        </div>
                                        <div class="col-md-10 col-xs-12">
                                            <p><b><?php echo $row['date']?>Bengaluru.</b><br>
                                            <?php echo $row['description']?><br>
                                            <?php echo $row['content']?>
                                            </p>
                                            <p class="author"><b>Author:jerry</b></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </fieldset> 
        <?php }?>
           <h5> <i class="fa fa-eye fa-2x views" aria-hidden="true">10,300</i><i class="fa fa-comment-o fa-2x comments" aria-hidden="true">1,500</i></h5>
           <div class="comment_list">
                <h3>Comments..</h3>
                <p><b>john</b><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                ulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus,
                </p>
                <p><b>jacer</b><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                ulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus,
                </p>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD Comment</button>
            </div>
             <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Provide Details</h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Name">
                        <input type="email" class="form-control" placeholder="Email">
                        <input type="number" class="form-control" placeholder="Phone Number">
                        <textarea name="textarea" id="" cols="30" rows="10" class="form-control"  placeholder="Comment"></textarea>
                        <button class="form-control">Comment</button>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        </div>  
        <?php 
        include('public_view_rightmenu.php');
        ?>
    </div>
</body>
</html>