<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Comments</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/admin_ref.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <?php
        include("sidebar.php");
        $sql="SELECT * FROM comment WHERE status=0";
        $retval=mysqli_query($conn, $sql);
    ?>
    <div class="container-fluid">
        <div class="wrapper top">
        <div class=" col-mx-12 ">
            <fieldset class="well col-md-12" >
                <ul class="nav nav-pills nav-justified" id="tab" >
                    <li class="active"><a data-toggle="pill" href="#approve_comments">Approval List</a></li>
                    <li><a data-toggle="pill" href="#view_comments">View </a></li>
                </ul>
                    
                <div class="tab-content">
                    <div id="approve_comments" class="tab-pane fade in active">
                        <div class="wrapper col-xs-12">
                            <div class=" col-mx-12 ">
                                <h2 class="text-center">Comments Approval List</h2>
                                    <form action="comment_approval.php" method="post">
                                        <div class="row " id="check_btn">
                                            <div class="btn-group">
                                                    <button type="submit" class="btn btn-success" name="comment_conf" id="comment_conf">Approve</button>
                                                    <!-- <button type="button" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i></button> -->
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 row ">
                                            <fieldset class="well">
                                                    <div class="table-responsive table-hover"> 
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>CONTENT</th>    
                                                                    <th>COMMENTED BY</th>
                                                                    <th>COMMENTER EMAIL</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <?php if(mysqli_num_rows($retval)==0) {?>
                                                                <div class="alert alert-warning">
                                                                <strong>Sorry!</strong> Nothing to display All Comments are aprroved
                                                                </div>
                                                            <?php }else{?> 
                                                            <?php while($row=mysqli_fetch_assoc($retval)){ ?>
                                                            <tbody>
                                                                <tr>
                                                                <td><?php echo $row['id']?></td>
                                                                    <input type="hidden" value= <?php echo $row ['id']?> name="comment_id[]">
                                                                    <td><?php echo $row['content']?></td>
                                                                    <td><?php echo $row['commented_by']?></td>
                                                                    <td><?php echo $row['commenter_email']?></td>
                                                                    <td><input type="checkbox" name="accept_comment_<?php echo $row['id'] ?>" value="1"></td>
                                                                </tr> 
                                                            </tbody>
                                                            <?php } ?>
                                                            <?php } ?>
                                                            
                                                        </table>
                                                    </div>
                                            </fieldset>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div id="view_comments" class="tab-pane fade">
                        <div class="row">
                            <h2 class="text-center">List of Posts</h2>
                            <fieldset class="well">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php 
                                        $sql1 = 'SELECT a.content,a.commented_by,a.created_date,a.id,a.status  FROM comment AS a'; 
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
                                                                        <th>content</th>
                                                                        <th>Commented-By</th>
                                                                        <th>Date</th>
                                                                        <th>status</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php while($row =mysqli_fetch_assoc($retval1)) { ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo $row['content']?></h3></td>
                                                                            <td> <?php echo $row['commented_by']?></td>
                                                                            <td> <?php echo $row['created_date']?></td>
                                                                            <td><?php if(($row['status'])==1){ echo '<spam class=" alert-success" padding :0px>APPROVED</spam>'; }else{ echo '<spam class=" alert-danger"padding :0px>NOT APPROVED</spam>'; }?>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <div class="modal fade" id="myModal_<?php echo $row['id']?>" role="dialog">
                                                                        <div class="modal-dialog">
                                                                            <!-- Modal content-->
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <p class="a_name" id="right"><b>Author:</b> <i><?php echo $row['name']?></i></p>
                                                                                    <h4 class="modal-title">TITLE :<?php echo $row['title']?> </h4> 
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p> DESCRIPTION :<?php echo $row['description']?></p>
                                                                                    <p> CONTENT:<?php echo $row['content']?></p><br>
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
                </div>
            </fieldset>
        </div>
    </div>
</html>