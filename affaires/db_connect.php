<?php
try {
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
} catch(PDOException $e){
    print "Erreur !: ". $e->getMessage()."<br/>";
    die();
}
?>