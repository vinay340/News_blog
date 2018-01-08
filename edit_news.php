<!DOCTYPE html>
<html lang="en">
    <head>
    <title>EDIT News</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin_ref.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <?php
        include('authorheader.php');
        include("mysql_conn.php");
        $post_id = $_GET['id'];
        $sql2 = "SELECT * FROM news  where id = '$post_id'";
        $result=mysqli_query($conn,$sql2) or die(mysqli_error());
    ?>        
    <body>
        <?php while($row =mysqli_fetch_assoc($result)) { ?>
        <div class="container">
            <div class="col-md-8 col-xs-12 wrapper top">
                <h2 class="caption">EDIT NEWS</h2>
                <form action="edited.php" method="post">
                    <div class="form-group">
                        <input type="hidden"class="form-control" id="id" placeholder="id" name="id" value=<?php echo $row['id']?>   >
                    </div>
                    <div class="form-group">
                        <input type="text"class="form-control" id="title" placeholder="Title" name="title" value="<?php echo $row['title']?>"  >
                    </div>
                    <div class="form-group">
                        <textarea type="Description" class="form-control" id="description" placeholder="Description" name="description"><?php echo $row['description']?>  </textarea>
                    </div>
                    <div class="form-group">
                        <textarea type="Content" class="form-control" id="content" placeholder="Content" name="content"   ><?php echo $row['content']?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="content" placeholder="Event date" name="date" value="<?php echo $row['date']?>"   >
                    </div>
                    <div class="form-group">
                        <button type="submit"  class="btn btn-primary col-md-4 submit_button">EDIT</button>
                        <a  class="btn btn-warning col-md-4 right cancel_button  " href="author_dashboard.php">CANCEL</a>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </body>
</html>