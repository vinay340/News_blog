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
        $sql="SELECT * FROM comment";
        $retval=mysqli_query($conn, $sql);
    ?>
    <div class="container-fluid">
        <div class="wrapper top">
            <div class="col-md-12 col-sm-12 col-xs-12 row ">
                <fieldset class="well">
                    <h2 class="text-center">List Of Comments</h2>
                        <div class="table-responsive table-hover"> 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>CONTENT</th>
                                        <th>COMMENTED BY</th>
                                        <th>COMMENTER EMAIL</th>
                                    </tr>
                                </thead>
                                <?php while($row=mysqli_fetch_assoc($retval)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['content']?></td>
                                        <td><?php echo $row['commented_by']?></td>
                                        <td><?php echo $row['commenter_email']?></td>
                                    </tr> 
                                    </tbody>
                                    <?php } ?>
                                </table>
                        </div>
                </fieldset>
            </div>
        </div>
    </div>
</html>