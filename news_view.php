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
            $tid=$_GET['id'];
        ?>
        <?php
                $sql2 = "SELECT a.title,a.description,a.content,a.date,a.id,b.name,a.created_date  FROM news AS a , user AS b  where a.author_id = b.id and a.id=$tid ";  
                $sql = "SELECT * FROM comment  where news_id = $tid";
                $retval=mysqli_query($conn,$sql2) or die(mysqli_error());
                $retval1=mysqli_query($conn,$sql) or die(mysqli_error());
        ?>
        <div class="public_content">
            <div class="row">
                <div class="col-md-9 col-xs-8 ">
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
                                                        <p class="author"><b><?php echo $row['name']?></b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </fieldset> 
                        <h3>Comments..</h3>
                        <?php
                            // If form submitted, insert values into the database.
                                if (isset($_POST['commented_by'])){
                                    $name=$_POST['commented_by'];
                                    $email=$_POST['commenter_email'];
                                    $content=$_POST['comment'];
                                    $news_id=$row['id'];
                                    $name = mysqli_real_escape_string($conn,$name); 
                                    $email = mysqli_real_escape_string($conn,$email);
                                    $content = mysqli_real_escape_string($conn,$content);
                                    $news_id = mysqli_real_escape_string($conn,$news_id);
                                    $sql_n = "SELECT * FROM comment WHERE commented_by='$name' and content='$content'";
                                    $res_n = mysqli_query($conn, $sql_n);
                                    if (mysqli_num_rows($res_n) > 0) {
                                        echo '<div class="container">
                                                    <div class="page-header">
                                                        <h5>comment already saved</h5>
                                                    </div>
                                                </div>;';
                                    } else{
                                        $query = "INSERT into `comment` (content, news_id,commented_by, commenter_email,created_date)
                                        VALUES ('$content', '$news_id' ,'$name','$email', CURDATE())";
                                        $result = mysqli_query($conn,$query) or die("Insert Error: ".mysqli_error($conn));
                                        if($result){
                                            echo "<p>succesfully commented</p>";
                                        }
                                    }
                                }
                            ?>
                        <div class="comment_list">
                    <?php while($row2 =mysqli_fetch_assoc($retval1)) { ?>
                                <p><b><i><?php echo $row2['commented_by']?></i></b><br></p>
                                <p><?php echo $row2['content']?></p>
                    <?php } ?>
                        </div>
                                
                     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD Comment</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Provide Details</h4>
                                </div>
                                <form action="" method="post" name="comment_list">
                                <div class="modal-body">
                                    <input type="text" class="form-control" placeholder="Name" name="commented_by">
                                    <input type="email" class="form-control" placeholder="Email" name="commenter_email">
                                    <textarea id="" cols="30" rows="10" class="form-control" name="comment" placeholder="Comment"></textarea>
                                    <button class="form-control">Comment</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
                <?php }?>
                <?php 
                include('public_view_rightmenu.php');
                ?>
                
            </div>
        </div>
    </body>
</html>