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
include ("sidebar.php");
include ("mysql_conn.php");
$sql = 'SELECT name,email,phone_no FROM user WHERE role_id =1';  
$sql1 = 'SELECT name,email,phone_no FROM user WHERE role_id =2';  
$sql2 = 'SELECT name,email,phone_no FROM user WHERE role_id =3';  


$retval=mysqli_query($conn, $sql); 
$retval1=mysqli_query($conn, $sql1); 
$retval2=mysqli_query($conn, $sql2); 


?>
    <body>
       <div class="top">
           <div class="container-fluid">
               <div class="wrapper col-xs-12">
                   <div class=" col-mx-12 ">
                        <fieldset class="well col-md-12" >
                            <ul class="nav nav-pills nav-justified" id="tab" >
                                    <li class="active"><a data-toggle="pill" href="#admin">Admins</a></li>
                                    <li><a data-toggle="pill" href="#authors">Authors</a></li>
                                    <li><a data-toggle="pill" href="#new_reg">New registrations</a></li>
                            </ul>
                                
                            <div class="tab-content">
                                    <div id="admin" class="tab-pane fade in active">
    
                                        <div class="row">
                                         <?php while($row = mysqli_fetch_assoc($retval)){?>
                                            
                                        <fieldset class="well">
                                            <div class="col-md-2 col-sm-12 col-xs-12">
                                                <img src="assets/images/NB.jpg" class="author_img">
                                            </div>
                                            <div class="col-md-10 col-sm-12 col-xs-12">
                                                
                                                <div class="table-responsive">          
                                                    <table class="table">
                                                       
                                                        <tbody>
                                                        <tr>
                                                        <th>Name</th>
                                                            <td><?php echo $row['name']?></td>
                                                        </tr>
                                                        <tr>
                                                        <th>Email</th>
                                                            <td><?php echo $row['email']?>@sds</td>
                                                        </tr>
                                                        <tr>
                                                        <th>Phone number</th>
                                                            <td><?php echo $row['phone_no']?></td>
                                                        </tr>
                                                        <tr>
                                                        <th>Number of posts</th>
                                                            <td>30</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                               
                                   
                                            </div>
                                            </fieldset>
                                            <?php } ?> 
                                        </div>
                                    </div>
                                    <div id="authors" class="tab-pane fade">
                                    <div class="row">
                                         <?php while($row1 = mysqli_fetch_assoc($retval1)){?>
                                            
                                        <fieldset class="well">
                                            <div class="col-md-2 col-sm-12 col-xs-12">
                                                <img src="assets/images/NB.jpg" class="author_img">
                                            </div>
                                            <div class="col-md-10 col-sm-12 col-xs-12">
                                                
                                                <div class="table-responsive">          
                                                    <table class="table">
                                                       
                                                        <tbody>
                                                        <tr>
                                                        <th>Name</th>
                                                            <td><?php echo $row1['name']?></td>
                                                        </tr>
                                                        <tr>
                                                        <th>Email</th>
                                                            <td><?php echo $row1['email']?></td>
                                                        </tr>
                                                        <tr>
                                                        <th>Phone number</th>
                                                            <td><?php echo $row1['phone_no']?></td>
                                                        </tr>
                                                        <tr>
                                                        <th>Number of posts</th>
                                                            <td>30</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                               
                                   
                                            </div>
                                            </fieldset>
                                            <?php } ?> 
                                        </div>
                                    </div>
                                    <div id="new_reg" class="tab-pane fade">
                                   <div class="row " id="check_btn">
                                   <div class="btn-group">
                                        <button type="button" class="btn btn-primary">view</button>
                                        <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i></button>
                                    </div>

                                   </div>
                                   
                                    <div class="row" >
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                
                                                <div class="table-responsive">          
                                                    <table class="table">
                                                       
                                                        <thead>
                                                        <tr>

                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone number</th>
                                                        <th>Role</th>
                                                        <th>#</th>
                                                        </tr>
                                                         </thead>
                                                         <?php while($row2 = mysqli_fetch_assoc($retval2)){?>
                                                         <tbody>
                                                             <tr>
                                                            <td><?php echo $row2['name']?></td>
                                                            <td><?php echo $row2['email']?></td>
                                                            <td><?php echo $row2['phone_no']?></td>
                                                            <td> <div class="form-group">
                                                                    <div class=" inputGroupContainer">
                                                                        <div class="input-group">
                                                                            <div class="btn-group radio-group">
                                                                            <label class="btn btn-primary not-active">Admin <input type="radio" value="admin" name="admin"></label>
                                                                            <label class="btn btn-primary not-active">Author <input type="radio" value="author" name="author"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                                 
                                                             </td>
                                                            <td>
                                                            <div class="radio">
                                                                <label><input type="checkbox" name="optradio"></label>
                                                            </div>                                       
                                                            </td>
                                                             </tr>
                                                         </tbody>
                                                         <?php } ?> 
                                                    </table>
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

