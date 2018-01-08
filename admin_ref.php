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
//$sql1 = 'SELECT a.name,a.email,a.phone_no,a.id,b.author_id FROM  user as a , news as b WHERE  a.role_id =2';  
$sql2 = 'SELECT name,email,phone_no,id FROM user WHERE role_id =3';  
$sql1 = 'SELECT name,email,phone_no,id FROM user WHERE role_id =2';  



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
                                            
                                        <fieldset class="well">
                                           <h2 class="text-center">List Of Admins</h2>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                
                                                <div class="table-responsive table-hover">          
                                                    <table class="table">
                                                       
                                                        <thead>
                                                        <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone number</th>
                                                        </thead>
                                         <?php while($row = mysqli_fetch_assoc($retval)){?>
                                                        
                                                        <tbody>
                                                        <tr>
                                                        <td><?php echo $row['name']?></td>
                                                        <td><?php echo $row['email']?></td>
                                                        <td><?php echo $row['phone_no']?></td>
                                                        </tr>
                                                        
                                                        </tbody>
                                            <?php } ?> 
                                                        
                                                    </table>
                                                </div>
                                               
                                   
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div id="authors" class="tab-pane fade">
                                    <div class="row">
                                            
                                        <fieldset class="well">
                                        <h2 class="text-center">List Of Authors</h2>
                                           
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                
                                                <div class="table-responsive table-hover">          
                                                    <table class="table">
                                                       
                                                        <thead>
                                                        <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone number</th>
                                                        </tr>
                                                        </thead>
                                         <?php while($row1 = mysqli_fetch_assoc($retval1)){?>
                                                        
                                                        <tbody>
                                                        <tr>
                                                        <td><?php echo $row1['name']?></td>
                                                        <td><?php echo $row1['email']?></td>
                                                        <td><?php echo $row1['phone_no']?></td>
                                                        </tr>
                                                        
                                                        
                                                        </tbody>
                                            <?php } ?> 
                                                       
                                                    </table>
                                                </div>
                                               
                                   
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div id="new_reg" class="tab-pane fade">
                                   <h2 class="text-center">List Of New Registrations</h2>
                                        
                                   <div class="row " id="check_btn">
                                   <form action="approval.php" method="post">

                                    
                                   </div>
                                   
                                    <div class="row" >
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                
                                                <div class="table-responsive table-hover"> 
                                                <?php if(mysqli_num_rows($retval2)==0) {?>
                                                                    <div class="alert alert-warning">
                                                                    <strong>Sorry!</strong> Nothing to display All registered users are aprroved
                                                                    </div>
                                        <button type="submit" class="btn btn-success pull-right" name="confirm" id="confirm" disabled>Approve</i></button>
                                                                    
                                                                <?php }else{?>
                                        <button type="submit" class="btn btn-success pull-right" name="confirm" id="confirm">Approve</i></button>
                                                                             
                                                    <table class="table">
                                                       
                                                        <thead>
                                                        <tr>
                                                        <th>id</th>

                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone number</th>
                                                        <th>Role</th>
                                                        <!-- <th>#</th> -->
                                                        </tr>
                                                         </thead>
                                                         
                                                               
                                                                <?php while($row2 = mysqli_fetch_assoc($retval2)){?>
                                                         <tbody>
                                                             
                                                                    <tr>
                                                            <td><?php echo $row2['id']?><input type="hidden" value= <?php echo $row2['id'] ?> name="author_id[]"></td>
                                                             
                                                            <td><?php echo $row2['name']?></td>
                                                            <td><?php echo $row2['email']?></td>
                                                            <td><?php echo $row2['phone_no']?></td>
                                                            <td> <div class="form-group">
                                                                    <div class=" inputGroupContainer">
                                                                        <div class="input-group">
                                                                            <div class="btn-group radio-group">
                                                                            <label class="btn btn-primary not-active">Admin <input type="radio" value ="1" name="role_<?php echo $row2['id'] ?>"></label>
                                                                            <label class="btn btn-primary not-active">Author <input type="radio" value="2" name="role_<?php echo $row2['id'] ?>"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                                 
                                                             </td>
                                                             </tr>
                                                         </tbody>
                                                             
                                                             <?php } ?> 
                                                    </table>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
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