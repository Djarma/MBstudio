<!DOCTYPE html>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once "connection.php";

if($_SESSION['admin']!= true){

       
    header('location:index.html ');
}
else{
    if(isset($_GET['id'])){
    $sql = "DELETE FROM gallery WHERE gallery_id =  :gallery_id";
    $stmt = $konekcija->prepare($sql);
    $stmt->bindParam(':gallery_id', $_GET['id'], PDO::PARAM_INT);   
    $stmt->execute();
    

    header("location:edit.php?id=".$_GET['project_id']);
    }
    else{
    header('location:index.html ');

    }
}
?>

