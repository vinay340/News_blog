<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/admin_ref.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <?php
        include("sidebar.php");
        include("mysql_conn.php");  
        include("auth.php");

        $sql = 'SELECT a.title,a.description,a.content,a.date,a.id,b.name  FROM news AS a , user AS b  where a.author_id=b.id and status = 0'; 
        
        $retval=mysqli_query($conn, $sql); 

    ?>
    <body>
     <div class="top">
           <div class="container-fluid">
               <div class="wrapper col-xs-12">
                   <div class=" col-mx-12 ">
                        <fieldset class="well col-md-12" >
                            <ul class="nav nav-pills nav-justified" id="tab" >
                                <li class="active"><a data-toggle="pill" href="#approve_posts">Approval List</a></li>
                                <li><a data-toggle="pill" href="#view_posts">View </a></li>
                                <li><a data-toggle="pill" href="#create_post">Create Post</a></li>
                            </ul>
                                
                            <div class="tab-content">
                                <div id="approve_posts" class="tab-pane fade in active">
                                    <div class="wrapper col-xs-12">
                                        <div class=" col-mx-12 ">
                                            <h2 class="text-center">Posts Approval List</h2>
                                            <form action="post_approve.php" method="post">
                                                <div class="row " id="check_btn">
                                                    <div class="btn-group">
                                                            <button type="submit" class="btn btn-success" name="post_conf" id="post_conf">Approve</button>
                                                            <!-- <button type="button" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i></button> -->
                                                    </div>
                                                 </div>
                                                <div class="row" >
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="table-responsive"> 

                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>id</th>
                                                                        <th>News-Title</th>
                                                                        <th>Description</th>
                                                                        <th>Author</th>
                                                                        <th>created-on</th>
                                                                        <th>#</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php if(mysqli_num_rows($retval)==0) {?>
                                                                    <div class="alert alert-warning">
                                                                    <strong>Sorry!</strong> Nothing to display All posts are aprroved
                                                                    </div>
                                                                <?php }else{?>   

                                                                <?php while($row = mysqli_fetch_assoc($retval)){?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo $row['id']?></td>
                                                                                <input type="hidden" value= <?php echo $row ['id']?> name="post_id[]">
                                                                            <td><?php echo $row['title']?></td>
                                                                            <td><?php echo $row['description']?></td>
                                                                            <td><?php echo $row['name'] ?></td>
                                                                            <td><?php echo $row['date']?></td>
                                                                            <td>
                                                                                <div class="form">
                                                                                    <label><input type="checkbox" name="accept_post_<?php echo $row['id'] ?>" value="1"></label>
                                                                                    <!-- <label class="btn btn-primary not-active">approve <input type="checkbox" value ="1" name="accept_post_"></label> -->
                                                                                </div>                                       
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                <?php } ?> 
                                                                <?php } ?> 
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="view_posts" class="tab-pane fade">
                                    <div class="row">
                                        <h2 class="text-center">List of Posts</h2>
                                        <fieldset class="well">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <?php 
                                                    $sql1 = 'SELECT a.title,a.description,a.content,a.date,a.id,b.name  FROM news AS a , user AS b  where a.author_id=b.id and status = 1'; 
                                                    $retval1=mysqli_query($conn, $sql1);
                                                ?>                                            
                                                <div class="public_content">
                                                    <div class=row>
                                                        <div class="col-md-12 col-xs-12 ">
                                                            <fieldset class="content">
                                                                <div class="wrapper recent-updated"> 
                                                                    <div id="upadtes-box" role="tabpanel" class="collapse show">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>News-Title</th>
                                                                                    <th>Description</th>
                                                                                    <th>Post_by</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <?php while($row =mysqli_fetch_assoc($retval1)) { ?>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><?php echo $row['title']?></h3></td>
                                                                                        <td> <?php echo $row['description']?></td>
                                                                                        <td> <?php echo $row['name']?></td>
                                                                                        <td>
                                                                                            <a type="submit" class="alink" data-toggle="modal" data-target="#myModal_<?php echo $row['id']?>" name="view_content" value= <?php echo $row['id']?>>More...</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                <div class="modal fade" id="myModal_<?php echo $row['id']?>" role="dialog">
                                                                                    <div class="modal-dialog">
                                                                                        <!-- Modal content-->
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <p class="a_name" id="right"><b>Author:</b> <i><?php echo $row['name']?></i></p>
                                                                                                <h4 class="modal-title"><?php echo $row['title']?> </h4> 
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <p> <?php echo $row['description']?></p>
                                                                                                <p> <?php echo $row['content']?></p><br>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                            <?php }?>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </fieldset> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div id="create_post" class="tab-pane fade">
                                    <div class="row " id="check_btn">
                                        <?php
                                            $a =$_SESSION['sess_user_id'];
                                            if (isset($_POST['submit']))
                                            {
                                                $title=$_POST['title'];
                                                $description=$_POST['description'];
                                                $content=$_POST['content'];
                                                $date=$_POST['date'];
                                                
                                                $title = mysqli_real_escape_string($conn,$title); 
                                                $description = mysqli_real_escape_string($conn,$description);
                                                $content = mysqli_real_escape_string($conn,$content);
                                                $date = mysqli_real_escape_string($conn,$date);
                                                $sql_u = "SELECT * FROM news  WHERE title='$title'";
                                                $sql_e = "SELECT * FROM news WHERE description='$description'";
                                                
                                                $res_u = mysqli_query($conn, $sql_u);
                                                $res_e = mysqli_query($conn, $sql_e);
                                                
                                        
                                                if (mysqli_num_rows($res_u) > 0) {
                                                echo '<div class="container">
                                                            <div class="page-header">
                                                                <h3> post has been updated</h3>
                                                            </div>
                                                        </div>';
                                                } else{
                                               
                                                //$trn_date = date("Y-m-d H:i:s");
                                                    $query = "INSERT into `news` (title, description,content,date, author_id,created_date)
                                                     VALUES ('$title','$description','$content','$date', '$a' , CURDATE())";
                                                    $result = mysqli_query($conn,$query) or die("Insert Error: ".mysqli_error($conn));
                                                   if($result)
                                                   {
                                                     echo "<div class='form'>    
                                                     <h3>succesfully news updated.</h3>
                                                       </div>";
                                                     }
                                                     }
                                            }       
                                        ?>
                                        <div class="container">
                                            <div class="col-md-8 col-xs-12">
                                                <h2 class="text-center">Create News</h2>
                                                <form action="" method="post" name="create_news">
                                                    <div class="form-group">
                                                        <input type="text"class="form-control" id="title" placeholder="Title" name="title" required  autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea type="Description" class="form-control" id="description" placeholder="Description" name="description" required  autofocus></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea type="Content" class="form-control" id="content" placeholder="Content" name="content" required  autofocus></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="date" class="form-control" id="content" placeholder="Event date" name="date" required  autofocus>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary col-md-4 submit_button" name="submit">CREATE</button>
                                                    <a class="btn btn-warning col-md-4 cancel_button  " id="right" href="posts.php" >CANCEL</a>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>              
                            </div>
                        </fieldset>
                   </div>
               </div>
           </div>

       </div> 
    </body>
</html>
<script>
    $(function() {
      // Input radio-group visual controls
      $('.radio-group label').on('click', function(){
          $(this).removeClass('not-active').siblings().addClass('not-active');
      });
  });
</script>