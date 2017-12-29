<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/author.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
    include('author_header.php');
    ?>
    <div class="public_content">
        <div class="container-fluid ">
            <div class="row">       
                <div class="col-md-8 col-xs-12">
                    <marquee behavior="scroll">Your last post reached 1500 views...</marquee>
                </div>
                <div class="col-md-4 col-xs-12 right">
                    <a href="create_news.php"><button type="button" class="btn btn-primary col-md-12">CREATE NEWS</button></a>
                </div>
            </div>
            <div class="tab">
                <ul class="nav nav-pills nav-justified" id="tab">
                    <li class="col-md-6 active" ><a  data-toggle="pill"  href="#me">Posts by me</a></li>
                    <li class="col-md-6"><a  data-toggle="pill"  href="#others">Posts by others</a></li>
                </ul>
                <div class="tab-content" >
                    <div id="me" class="tab-pane fade in active">
                        <fieldset class="content">
                                <div class="wrapper recent-updated"> 
                                    <div id="upadtes-box" role="tabpanel" class="collapse show">
                                        <ul class="news list-unstyled">
                                            <li class="d-flex justify-content-between" > 
                                                <div class="left-col d-flex">
                                                    <div class="title">
                                                        <strong>
                                                            <h3>Headline <a href="edit_news.php"><i class="fa fa-pencil-square-o right" aria-hidden="true"></i>&nbsp;</a><b class="right">12dec</b></h3>
                                                        </strong>
                                                    </div> 
                                                    <div class="col-md-2 col-xs-12">
                                                        <img  class ="img1" src="assets/images/download.jpeg">
                                                    </div>
                                                    <div class="col-md-10 col-xs-12">
                                                        <p><b>18 DEC,Bengaluru.</b><br>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                                                            vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, 
                                                            ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, 
                                                            et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna.
                                                            Aenean velit odio
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </fieldset>
                    </div>
                    <div id="others" class="tab-pane fade">
                        <fieldset class="content" id="others" >
                            <div class="wrapper recent-updated"> 
                                <ul class="news list-unstyled">
                                    <li class="d-flex justify-content-between" *ngFor="let n of news" > 
                                        <div class="left-col d-flex">
                                            <div class="title">
                                                <strong><h3>Headline<b class="n_date">12dec</b></h3></strong>
                                            </div> 
                                            <div class="col-md-2 col-xs-12">
                                                <img  class ="img1" src="assets/images/download.jpeg">
                                            </div>
                                            <div class="col-md-10 col-xs-12">
                                                <p><b>18 DEC,Bengaluru.</b><br>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                                                    vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, 
                                                    ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, 
                                                    et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna.
                                                    Aenean velit odio
                                                </p>
                                                <p>author name</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>