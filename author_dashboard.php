<!DOCTYPE html>
<html>
    <head>
        <title>Author Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/admin_ref.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php 
            include('authorheader.php');
            $a= $_SESSION['sess_user_id'];
            $perpage =2;
            if(isset($_GET['pagination_post']) & !empty($_GET['pagination_post'])){
                $curpage = $_GET['pagination_post'];
            }else{
                $curpage = 1;
            }
            $start = ($curpage * $perpage) - $perpage;
            $PageSql = "SELECT * FROM `news`where author_id!=$a";
            $pageres = mysqli_query($conn, $PageSql);
            $totalres = mysqli_num_rows($pageres);

            $endpage = round($totalres/$perpage); 
                                    
            $startpage = 1;
            $nextpage = $curpage + 1;
            $previouspage = $curpage - 1;
            $sql = "SELECT title,description,content,date,id, created_date,status FROM news WHERE author_id = $a ORDER BY created_date DESC";  
            $sql1 = "SELECT a.title,a.description,a.content,a.date,a.id,b.name,a.created_date FROM news AS a, user AS b WHERE a.author_id != $a  && a.author_id=b.id LIMIT $start, $perpage";  
            $retval=mysqli_query($conn, $sql);
            $retval1=mysqli_query($conn, $sql1); 
            if(isset($_GET['id'])){
                $p_post=$_GET['id'];
            }
            else{
                $p_post="";
            }
            if(isset($_GET['msg'])){

                $message=$_GET['msg'];
                }
                else{
                    $message="";
                }
                if(isset($_GET['editmsg'])){
                    $edit=$_GET['editmsg'];
                }
                else{
                    $edit="";
                }
        ?>
        <div class="container-fluid">
            <div class="wrapper a_header">
                <div class="col-md-12 col-sm-12 col-xs-12 row ">     
                    <div class="col-md-4 col-xs-12 " id="right">
                        </div>
                    </div>
                    <div class="tab">
                        <ul class="nav nav-pills nav-justified" id="tab1">
                            <?php if($p_post=="c_post"){
                                $other="active";
                                $others_page=$me="";
                            }else if($p_post=="page_post"){
                            $others_page="active";
                            $me=$other="";
                            }
                            else{
                                $me="active";
                                $others=$others_page="";
                            }
                            ?>
                        <li class="col-md-6 <?php echo $me?>" ><a  data-toggle="pill"  href="#me">POSTS BY ME</a></li>
                        <li class="col-md-6 <?php echo $others_page?>"><a  data-toggle="pill"  href="#others">POSTS BY OTHERS</a></li>
                        <li class="col-md-6 <?php echo $other?>">  <a  data-toggle="pill" href="#create_news">CREATE POST</a></li>
                    </ul>
                    <div class="tab-content" >
                        <div id="me" class="tab-pane fade in <?php echo $me?>">
                        <?php if($edit){?>
                                    <div class="nav-justified alert alert-success" >
                                        <?php echo $edit?>
                                    </div>
                                <?php }?>        
                            <h2 class="text-center">MY POSTS</h2>
                            <?php while($row = mysqli_fetch_assoc($retval)){?>
                            <fieldset class=" container well">
                                <div class="wrapper recent-updated"> 
                                    <div id="upadtes-box" role="tabpanel" class="collapse show">
                                        <ul class="news list-unstyled">
                                            <li class="d-flex justify-content-between" > 
                                                <div class="left-col d-flex">
                                                    <div class="col-md-2" id="right">
                                                        <a href="edit_news.php?id= <?php echo $row['id']?>  ">
                                                            <i type="submit"id="right" class="fa fa-pencil-square-o " aria-hidden="true">&nbsp;</i>
                                                        </a><br>
                                                        <b id="right">CREATED DATE</b><span class="pull-right" id="fogblack"><?php echo $row['created_date']?></span><br>
                                                    </div>
                                                    <div class="row">
                                                        <div class="title col-md-10">
                                                            <strong><h3><i><?php echo $row['title']?></i></h3></strong>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-12 col-xs-12">
                                                        <p id="fogblack"><b><?php echo $row['date']?></b></p><br>             
                                                        <p><?php echo $row['description']?></p><br>
                                                        <p id="right"><?php if(($row['status'])==1){ echo '<spam class=" alert-success">APPROVED</spam>'; }else{ echo '<spam class=" alert-danger">NOT APPROVED</spam>'; }?></p><br>
                                                        <a id="right" type="submit" class="alink" data-toggle="modal" data-target="#myModal_<?php echo $row['id']?>" name="view_content" value= <?php echo $row['id']?>>More...</a>
                                                    </div>
                                                    <div class="modal fade" id="myModal_<?php echo $row['id']?>" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><b>TITLE : </b><?php echo $row['title']?> </h4> 
                                                                    <p><b>EVENT DATE :</b><?php echo $row['date']?></p>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><b>DESCRIPTION : </b><i> <?php echo $row['description']?></i></p>
                                                                    <b>CONTENT</b>
                                                                    <div>
                                                                        <p><?php echo nl2br($row['content'])?><br></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p class="pull-left"><b>CREATED DATE :</b><?php echo $row['created_date']?></p>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </fieldset>
                            <?php }?>
                        </div>
                        <div id="others" class="tab-pane fade in <?php echo $others_page?>">
                            <h2 class="text-center">OTHER POSTS</h2>
                            <?php while($row1  = mysqli_fetch_assoc($retval1)){?>
                            <fieldset class=" container well">
                                <div class="wrapper recent-updated"> 
                                    <div id="upadtes-box" role="tabpanel" class="collapse show">
                                        <ul class="news list-unstyled">
                                            <li class="d-flex justify-content-between" > 
                                                <div class="left-col d-flex">
                                                <b id="right">CREATED DATE</b><span class="pull-right" id="fogblack"><?php echo $row1['created_date']?></span><br>
                                                    <div class="row">
                                                        <div class="title col-md-10">
                                                            <strong><h3><i><?php echo $row1['title']?></i></h3></strong>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-12 col-xs-12">
                                                        <p id="fogblack"><b><?php echo $row1['date']?></b></p><br>             
                                                        <p><?php echo $row1['description']?></p><br>
                                                        <p id="right"><b>Author:</b><?php echo $row1['name']?></p><br>
                                                        <a id="right" type="submit" class="alink" data-toggle="modal" data-target="#myModal_<?php echo $row1['id']?>" name="view_content" value= <?php echo $row1['id']?>>More...</a>
                                                    </div>
                                                    <div class="modal fade" id="myModal_<?php echo $row1['id']?>" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <p class="a_name" id="right"><b>AUTHOR: </b> <i><?php echo $row1['name']?></i></p>
                                                                    <h4 class="modal-title"><b>TITLE : </b><?php echo $row1['title']?> </h4> 
                                                                    <p><b>EVENT DATE :</b><?php echo $row1['date']?></p>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><b>DESCRIPTION : </b><i> <?php echo $row1['description']?></i></p>
                                                                    <b>CONTENT</b>
                                                                    <p> <?php echo $row1['content']?></p><br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p class="pull-left"><b>CREATED DATE :</b><?php echo $row1['created_date']?></p>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </fieldset>
                            <?php }?>
                            <nav aria-label="Page navigation nav-justified">
                                <ul class="pagination">
                                    <?php if($curpage >= 2){ ?>
                                        <li class="page-item"><a class="page-link" href="author_dashboard.php?id=page_post&pagination_post=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                                    <?php } ?>
                                        <li class="page-item active"><a class="page-link" href="author_dashboard.php?id=page_post&pagination_post=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                                    <?php if($curpage != $endpage){ ?>
                                        <li class="page-item"><a class="page-link" href="author_dashboard.php?id=page_post&pagination_post=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                                    <?php }?>
                                </ul>
                            </nav>  
                        </div>
                        <div id="create_news" class="tab-pane fade in <?php echo $other?>">
                            <?php

                            // If form submitted, insert values into the database.
                                if (isset($_POST['title']))
                                {
                                    $title=$_POST['title'];
                                    $description=$_POST['description'];
                                    $content=$_POST['content'];
                                    $date=$_POST['date'];
                                    $category=$_POST['category'];
                                    $title = mysqli_real_escape_string($conn,$title); 
                                    $description = mysqli_real_escape_string($conn,$description);
                                    $content = mysqli_real_escape_string($conn,$content);
                                    $date = mysqli_real_escape_string($conn,$date);
                                    $category = mysqli_real_escape_string($conn,$category);
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
                                    } else
                                    {
                                            
                                        //$trn_date = date("Y-m-d H:i:s");
                                        $query = "INSERT into `news` (title, description,content,date, author_id,category_id,created_date)
                                        VALUES ('$title','$description','$content','$date', '$a','$category' , CURDATE())";
                                        $result = mysqli_query($conn,$query) or die("Insert Error: ".mysqli_error($conn));
                                        if($result){
                                            echo "<script>window.open('author_dashboard.php?id=c_post&msg=created successfully','_self')</script>";

                                        }           
                                    }
                                }
                            ?>
                            <div class="container">
                                <?php if($message){?>
                                    <div class="nav-justified alert alert-success" >
                                        <?php echo $message?>
                                    </div>
                                <?php }?>
                                <fieldset class="well">
                                    <div class="col-md-6 col-xs-12 top">
                                        <h2 class="text-center">CREATE POST</h2>
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
                                                <select class="form-control" id="sel" placeholder="select category" name="category" required  autofocus>
                                                    <option  disabled>select category</option>
                                                    <option value="1" >sports</option>
                                                    <option value="2" >Entertainment</option>
                                                    <option value="3">politics</option>
                                                    <option value="4">world</option>
                                                    <option value="5">Educational</option>
                                                    <option value="6">Economy</option>
                                                    <option value="7">Technology</option>
                                                    <option value="8">Health</option>
                                                    <option value="9">Horoscope</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control" id="content" placeholder="Event date" name="date" required  autofocus>
                                            </div>
                                            <button type="submit" class="btn btn-primary col-md-4 submit_button">CREATE</button>
                                            <a class="btn btn-warning col-md-4 cancel_button  " id="right" href="author_dashboard.php" >CANCEL</a>
                                        </form>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>