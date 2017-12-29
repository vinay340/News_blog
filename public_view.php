<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Public view</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
    
?>
<body >
    <?php 
    include('public_view_header.php');
    ?>
    <div class="public_content">
        <hr>
        <marquee behavior="scroll">Important news text goes here <sup><span class="bubble">new</span></sup></marquee>
        <hr>   
        <div class=row>
            <div class="col-md-8 col-xs-8 ">
                <a href="news_view.php">
                <fieldset class="content">
                    <div class="wrapper recent-updated"> 
                        <div id="upadtes-box" role="tabpanel" class="collapse show">
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
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </fieldset> 
                </a>
                <fieldset class="content">
                    <div class="wrapper recent-updated"> 
                        <div id="upadtes-box" role="tabpanel" class="collapse show">
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
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </fieldset>
                <div class="col-md-2 col-xs-12">
                    <img class ="img1"src="assets/images/download.png">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                    vulputate eu pharetra nec, mattis ac neque.
                    </p>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img class ="img1"src="assets/images/download.png">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                    vulputate eu pharetra nec, mattis ac neque.
                    </p>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img class ="img1"src="assets/images/download.png">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                    vulputate eu pharetra nec, mattis ac neque.
                    </p>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img class ="img1"src="assets/images/download.png">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, 
                    vulputate eu pharetra nec, mattis ac neque.
                    </p>
                </div>  
            </div>
            <?php 
            include('public_view_rightmenu.php');
            ?>
        </div>
    </div>
</body>
</html>
