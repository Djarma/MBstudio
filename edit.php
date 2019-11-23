<!DOCTYPE html>
<?php 
session_start();
require_once "connection.php";


if($_SESSION['admin']!= true){
    header('location:index.html ');
}
else{
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
}
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
                        about design</a>
                </h1>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <!-- Admin Panel -->
            <!-- creating new project -->
            <form action="edit.php?id=<?php echo $_GET['id']?>" class="w-50 float-left" method="POST"name="project" id="project" enctype="multipart/form-data">  
                <h3>Edit <?php echo $project[0]->project_name; ?> </h3> <input type="text" name="project_name" class="d-block mb-3 w-50" placeholder="Project Name" value="<?php echo $project[0]->project_name; ?>">
                <textarea id="content-textarea" class="d-block mb-3 w-50" placeholder="Write project content here" rows="4" cols="30" name="project_text"><?php echo $project[0]->project_text; ?> </textarea>
                <select name="project_category" class="d-block mb-3 btn btn-dark">
                    <option selected="selected"><?php echo $project[0]->project_category; ?></option>
                    <option value="exterior">EXTERIOR</option>
                    <option value="interior">INTERIOR</option>
                    <option value="multi-residental">MULTI-RESIDENTAL</option>
                </select>
                <input type="text" class="d-block mb-3" name="project_year" value="<?php echo $project[0]->project_year; ?>"placeholder="Project Year">
                <h6>Thumbnail image</h6>
                <input type="file" class="d-block mb-4" name="project_image" accept="image/jpg,image/jpeg" /> 
                <input type="submit" class="d-block btn btn-success" name="project" value="Save project">
            </form>
                <?php if(isset($_POST['project'])):?>
                <?php   $heading = $_POST['project_name'];?>
                <?php if(strlen($heading)>0):?>
                    <?php  
                    if(move_uploaded_file($_FILES['project_image']['tmp_name'], __DIR__.'/img/'.$_FILES['project_image']['name'])) { 
                        //    echo "File uploaded successfully!"; 
                           $image_path ='img/'. $_FILES['project_image']['name'];
                      
                          } else{ 
                            $image_path ='';
                          } 
                    $content = $_POST['project_text'];
                    $category = $_POST['project_category'];
                    $year = $_POST['project_year'];
                    $query = "UPDATE projects SET project_name=:name,project_text=:text,project_category=:category,project_year=:year,project_image=:project_image WHERE project_id=:project_id";
                    $sth = $konekcija->prepare($query);
                    $sth->bindValue(':name', $heading, PDO::PARAM_STR);
                    $sth->bindValue(':text', $content, PDO::PARAM_STR);
                    $sth->bindValue(':category', $category, PDO::PARAM_STR);
                    $sth->bindValue(':year', $year, PDO::PARAM_STR);
                    $sth->bindParam(':project_id', $_GET['id'], PDO::PARAM_INT);
                    $sth->bindParam(':project_image', $image_path, PDO::PARAM_STR);
                    $sth->execute();
                    
                    
                    ?>
                    <script>
                        // refreshes page(better than header)
                        if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href="admin.php" );
                        }
                    </script>  
                <?php else: ?>
                 <p>Unesite ime projekta</p>
                <?php endif;?>
                    
                    <!-- end of creating new project -->
                    <!-- list of gallery photos -->
                  
                   
        <?php endif;?>
        <div class="list-of-photos mt-5"> 
                        <table class="gallery-table mb-3">
                            <th class="mb-3">Gallery Photo</th>
                            <th class="pl-3 mb-3">Remove</th>
                            <?php foreach ($gallery as $photo):?>
                            <tr>
                                <td class="text-center"><img height="50" width="50" src="<?php echo ($photo->image_path);?>" alt=""></td>

                                <td class="pl-3"><a href="delete_photo.php?id=<?php echo $photo->gallery_id;?>&project_id=<?php echo $_GET['id'];?>">Remove</a></td>
                            
                            </tr>
                            <?php endforeach; ?>
                       </table>
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST"name="gallery_photo" id="gallery_photo" enctype="multipart/form-data">
                <h6>Add more photos</h6>    
                <input type="file" name="my_file[]" multiple>
                <input type="submit" name="gallery_photo" value="Add photos">
            </form>
            <?php if (isset($_FILES['my_file'])):?> 
                    <?php   
                    //  Gallery
                        $myFile = $_FILES['my_file'];
                        $fileCount = count($myFile["name"]);
                        $project_id = $_GET['id'];
                        for ($i = 0; $i < $fileCount; $i++){
                            if(move_uploaded_file($myFile["tmp_name"][$i], __DIR__.'/img/'.$myFile["name"][$i])) { 
                                // echo "File uploaded successfully!"; 
                                $gallery_image_path ='img/'. $myFile["name"][$i];
                                $gallery = "INSERT INTO gallery (project_id,image_path) VALUES (:project_id, :image_path)";
                                $sth = $konekcija->prepare($gallery);
                                $sth->bindValue(':project_id', $project_id);
                                $sth->bindValue(':image_path', $gallery_image_path);
                                $sth->execute();
                               }
                              }
                              
                     ?>
                      <script>
                        // refreshes page(better than header)
                        if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href="admin.php" );
                        }
                    </script>  
                     <?php endif;?>
                    </div> 
      </div>
       
    </main>
    <!--SCRIPTS goes here-->
    <!--First jquery, then popper and finaly bootstrap-->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/popper.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!--All page js-->
    <script src="js/main.js" type="text/javascript"></script>
</body>

</html>