<?php
 require_once('connect.php');
 header ('Content-Type: application/json');

$sql=" SELECT ANAFF,SUM(IDAFFAIRES) AS NOMBR from affaires where ANAFF <>0  GROUP BY ANAFF ORDER BY ANAFF DESC LIMIT 5";

$ga_conn=ga_connexion();
$exe=mysqli_query($ga_conn,$sql);

$dataann = array();
$datanbr = array();
while($row=mysqli_fetch_assoc($exe))
{   
    $dataann[]=$row["ANAFF"];
    $datanbr[]=$row["NOMBR"];
  
}
$chartlabel = json_encode($dataann);
$chartData = json_encode($datanbr, JSON_NUMERIC_CHECK);
echo '<Br>'.$chartlabel;
echo '<Br>'.$chartData;
?>