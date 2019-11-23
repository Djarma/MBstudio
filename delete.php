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
    $sql = "DELETE FROM projects WHERE project_id =  :project_id";
    $stmt = $konekcija->prepare($sql);
    $stmt->bindParam(':project_id', $_GET['id'], PDO::PARAM_INT);   
    $stmt->execute();
    

    header('location:admin.php ');
    }
    else{
    header('location:index.html ');

    }
}
?>

