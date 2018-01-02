<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"                  href="css/admin_ref.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <?php
include("sidebar.php");
include("mysql_conn.php");  

$sql = 'SELECT a.title,a.description,a.content,a.date,a.id,b.name  FROM news AS a , user AS b  where a.author_id=b.id and status = 0';  
$retval=mysqli_query($conn, $sql); 

    ?>
    <body>
        <div class="top">
           <div class="container-fluid">
               <div class="wrapper col-xs-12">
                   <div class=" col-mx-12 ">
                       <h2>NEWS LIST</h2>
                        <fieldset class="well col-md-12" >
                                   <div class="row " id="check_btn">
                                   <form action="post_approve.php" method="post">

                                   <div class="btn-group">
                                        <button type="button" class="btn btn-primary">view</button>
                                        <button type="submit" class="btn btn-success" name="post_conf" id="post_conf"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i></button>
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
                                                         <?php while($row = mysqli_fetch_assoc($retval)){?>
                                                         <tbody>
                                                             <tr>
                                                            <td><?php echo $row['id']?></td>
                                                            <input type="hidden" value= <?php echo $row ['id']?> name="post_id[]"></td>
                                                             
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
                                                    </table>
                                                </div>
                                               
                                   
                                            </div>
                                             
                                         
                                        </div>
                                        </form>
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