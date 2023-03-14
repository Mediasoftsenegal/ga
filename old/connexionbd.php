<?php

$servername = "localhost";
$username = "groupe10_groupeal";
$password = "Alpages@2017";
$db_name = "groupe10_alp";

$conn = mysqli_connect($servername, $username, $password, $db_name);
if ($conn) {
	echo "Connexion échoué";
}
