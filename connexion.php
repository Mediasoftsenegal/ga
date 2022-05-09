<?php
//$link=mysqli_connect("localhost","groupe10_groupeal","Alpages@2017") or die(mysqli_error($link));
//mysqli_select_db($link,"groupe10_ga") or die(mysqli_error($link));
$servername = 'localhost';
 $username = 'root';
 $password = '';

try{
$pdo = new PDO("mysql:host=$servername;dbname=ga_10", $username, $password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
  }

?>