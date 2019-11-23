<!DOCTYPE html>
<?php 
session_start();
require_once "connection.php";
$select_projects ="SELECT * FROM projects";
$list_projects = $konekcija->prepare($select_projects);
$list_projects->execute();
$projects = $list_projects->fetchAll();
$projects = array_reverse($projects);
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!--external css, like plugins ...-->
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />

    <!--theme css-->
    <link href="css/theme.css" rel="stylesheet" type="text/css" />

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
                    <a href="index.html" class="text-uppercase navbar-brand-info d-none d-md-inline-block">it's all
                        about
                        design</a>
                </h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link  active" href="work.php">work</a>
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
    <!-- main start -->
    <main>
        <section class="work-gallery">
            <div class="container">
                <div class="row">
                <div class="col-12">
                        <div class="work-gallery-filter text-center mb-5">
                            <ul class="list-unstyled">
                                <li class="mb-1">
                                    <button class="filter-button text-uppercase act" data-filter="all">all
                                        work</button>
                                </li>
                                <li class="mb-1">
                                    <button class="filter-button text-uppercase"
                                        data-filter="exterior">exterior</button>
                                </li>
                                <li class="mb-1">
                                    <button class="filter-button text-uppercase"
                                        data-filter="interior">interior</button>
                                </li>
                                <li class="mb-1">
                                    <button class="filter-button text-uppercase"
                                        data-filter="multi-residental">multi-residental</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php foreach($projects as $project):?>
                                <div class="col-12 col-md-6 col-lg-3 <?php echo $project->project_category;?> filter">
                                    <div class="work-gallery-item">
                                        <figure class="mb-4">
                                            <img class="img-fluid"
                                                src="<?php echo $project->project_image;?>" alt="" />
                                            <div class="hover">
                                                <a href="single_project.php?id=<?php echo $project->project_id;?>" class="text-uppercase hover-item">
                                                    <p>
                                                        explore
                                                    </p>
                                                    <span class="arrow-small"><img src="img/arrow_small-01.svg"></span>
                                                </a>
                                            </div>
                                        </figure>
                                        <h6 class="text-uppercase"><?php echo $project->project_name;?></h6>
                                    </div>
                                </div>
                            <?php endforeach;?>
                </div>
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled mr-auto">
                            <a class="page-link-a" href="#" tabindex="-1">
                                <svg id="Layer_1" class="a-left" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 60 16">
                                    <title>arrow_slider_left</title>
                                    <polygon
                                        points="1.91 7.5 9.41 0 8 0 0 8 8 16 9.41 16 1.91 8.5 60 8.5 60 7.5 1.91 7.5" />
                                </svg>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item ml-auto">
                            <a class="page-link-a" href="#" tabindex="-1">
                                <svg id="Layer_1" class="a-right" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 60 16">
                                    <title>arrow_slider_right</title>
                                    <polygon
                                        points="58.09 7.5 50.59 0 52 0 60 8 52 16 50.59 16 58.09 8.5 0 8.5 0 7.5 58.09 7.5" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
    </main><!-- main start ends -->
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