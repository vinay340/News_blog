<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/author.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="col-md-8 col-xs-12">
            <h2 class="caption">CREATE NEWS</h2>
            <form action="author_dashboard.php">
                <div class="form-group">
                    <input type="text"class="form-control" id="title" placeholder="Title" name="title">
                 </div>
                <div class="form-group">
                    <textarea type="Description" class="form-control" id="description" placeholder="Description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <textarea type="Content" class="form-control" id="content" placeholder="Content" name="content"></textarea>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="content" placeholder="Event date" name="date">
                </div>
                
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Save to Drafts</label>   
                </div>
                <button type="submit" class="btn btn-default col-md-4 submit_button">CREATE</button>
                <button type="canel" class="btn btn-default col-md-4 cancel_button  right" href="author_dashboard.php" class="btn btn-default">CANCEL</button>

            </form>
        </div>
    </div>
</body>
</html>