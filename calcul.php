<?php
 header ('Content-Type: application/json');
 require_once('connect.php');
 $sql="SELECT ANNEE,SUM(MONTANTHONORAIRE) AS MONTOFFRE from offres  where ANNEE <>0   GROUP BY ANNEE  ORDER BY ANNEE DESC LIMIT 5";

 $ga_conn=ga_connexion();
 $exe=mysqli_query($ga_conn,$sql);
 
 $data =array();
 foreach($exe as $row) {
    $data[]=$row;
 }
 mysqli_close($ga_conn);

 echo json_encode($data);
?>