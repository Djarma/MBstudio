<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();
require_once "connection.php";
// project
$select_projects ="SELECT * FROM projects WHERE project_id =  :project_id";
$stmt = $konekcija->prepare($select_projects);
$stmt->bindParam(':project_id', $_GET['id'], PDO::PARAM_INT);   
$stmt->execute();
$project = $stmt->fetchAll();
// gallery
$select_gallery ="SELECT * FROM gallery WHERE project_id =  :project_id";
$stmt = $konekcija->prepare($select_gallery);
$stmt->bindParam(':project_id', $_GET['id'], PDO::PARAM_INT);   
$stmt->execute();
$gallery = $stmt->fetchAll();
?>
<html lang="en">
    <head>
        <title>MBstudio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--iOS compatibile-->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="MBstudio">
        <link rel="apple-touch-icon" href="putanja do ikonice favicon li neke">        

        <!--Android compatibile-->
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="aplication-name" content="MBstudio">
        <link rel="icon" type="icon/png" href="putanja do ikonice favicon li neke">

        <!--FONTOVI-->
        <!--Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--bootstrap-->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <!--external css, like plugins ...-->
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css"/>

        <!--theme css-->
        <link href="css/theme.css" rel="stylesheet" type="text/css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <h1>
                        <a class="navbar-brand text-uppercase" href="index.html">mb studio</a>
                        <a href="index.html" class="text-uppercase navbar-brand-info d-none d-md-inline-block">it's all about design</a>
                    </h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                        <?xml version="1.0" encoding="utf-8"?>
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 20"
                            style="enable-background:new 0 0 32 20;" xml:space="preserve">
                            <g>
                                <rect width="32" height="1" />
                            </g>
                            <g>
                                <rect y="9.5" width="32" height="1" />
                            </g>
                            <g>
                                <rect y="19" width="32" height="1" />
                            </g>
                        </svg>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="navbar-nav ml-auto text-uppercase">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html"><img class="home" src="img/icon_home-01.svg"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="process.html">process</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="work.php">work</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">about</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <section class="single-work">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10">
                            <div class="single-work-gallery owl-carousel">
                                <?php foreach ($gallery as $gallery_photo): ?>
                                    <img src="<?php echo $gallery_photo->image_path;?>" alt=""/>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="single-work-item">
                                <h3 class="text-uppercase"><?php echo $project[0]->project_name;?></h3>
                                <p>
                                   <?php echo $project[0]->project_text;?>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="single-work-info">
                                <div class="category">
                                    <p>category</p>
                                    <h6><?php echo $project[0]->project_category;?></h6>
                                </div>
                                <div class="year">
                                    <p>year of complition</p>
                                    <h6><?php echo $project[0]->project_year;?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-work-back">
                                <a href="work.php">
                                        <svg id="Layer_1" class="back" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 24">
                                            <title>icon_back_to_list</title>
                                            <circle cx="2" cy="2" r="2"/><circle cx="12" cy="2" r="2"/><circle cx="22" cy="2" r="2"/><circle cx="32" cy="2" r="2"/><circle cx="2" cy="22" r="2"/><circle cx="12" cy="22" r="2"/><circle cx="22" cy="22" r="2"/><circle cx="32" cy="22" r="2"/><circle cx="2" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="22" cy="12" r="2"/><circle cx="32" cy="12" r="2"/>
                                        </svg>
                                    <p>back to all work</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="copyright">
                <p>
                    Copyright © mbstudio.us. All rights reserved. 
                </p>
            </div>
        </footer>
        <!--SCRIPTS goes here-->
        <!--First jquery, then popper and finaly bootstrap-->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/popper.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>

        <script src="js/owl.carousel.js" type="text/javascript"></script>
        <script src="js/TweenMax.min.js" type="text/javascript"></script>
        <!--All page js-->
        <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>
