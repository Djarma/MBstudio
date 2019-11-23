<?php 
// database connection

try {
    $konekcija = new PDO("mysql:host=localhost;dbname=MBstudio;charset=utf8","root","root");
    $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e){
    echo $e->getMessage();
}