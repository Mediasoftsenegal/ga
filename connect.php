<?php
Function ga_connexion()
{
	$servername = 'localhost';
	$username = 'groupe10_groupeal';
	$password = 'Alpages@2017';
	$db='groupe10_ga';
		
	// Create connection
		$ga_conn = mysqli_connect($servername,$username,$password,$db);
	// Check connection
		if (!$ga_conn) 
			{
			die("Echec de Connexion: ".mysqli_connect_error());
			} 	 
		else 
			{
			// echo 'Connexion reussie à la Base de donnéees'.'<br>';
			}
		mysqli_select_db($ga_conn,$db);
		return $ga_conn;
}

Function fermer_connexion($ga_conn)
{
mysqli_close($ga_conn);
}

// Clients
// Recherche clients
Function search_client($nomc,$prenom,$codeClient)
{
	$sql="SELECT * FROM `clients` 
	WHERE `clients`.`Societe` LIKE '".$nomc."' OR `clients`.`Prenom_s_et_nom` LIKE '".$prenom."'
	OR `clients`.`NumClient` = '".$codeClient."'
	ORDER BY `clients`.NumClient";

	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;

}
// liste des clients
Function liste_clients()
{
	$sql="SELECT * FROM `clients`";
	
	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;
}	
// Nombre offres sur 5 ans
function nombreoffre()
{
	$sql="SELECT ANNEE,COUNT(IDOFFRES) AS NBRE from `offres` GROUP BY ANNEE ORDER BY ANNEE DESC LIMIT 5";

	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;

}
// Nombre offres sur 5 ans
function nombrecomm()
{
	$sql="SELECT  LEFT(DATECOMMANDE,4) AS AN,COUNT(IDCOMMANDES) AS NBRE from commandes 	GROUP BY AN ORDER BY AN DESC LIMIT 5";

	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;

}
// Nombre Affaires sur 5 ans
function nombreaffaire()
{
	$sql="SELECT ANAFF,COUNT(IDAFFAIRES) AS nbre FROM affaires GROUP BY ANAFF  DESC LIMIT 5";

	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;

}
//Montant offres sur 5 ans 
function montoffre()
{
	$sql="SELECT ANNEE,SUM(MONTANTHONORAIRE) AS MONTOFFRE from offres where ANNEE <>0 GROUP BY ANNEE ORDER BY ANNEE DESC LIMIT 5"; 

	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;
}
// nombre clients
function compteur()
{
	$sql="SELECT COUNT(*) AS nbr FROM `clients`";
	
	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;
}
// dernier client
function last_code()
{
	$sql="SELECT distinct `clients`.NumClient  FROM `clients` ORDER BY  `clients`.NumClient DESC LIMIT 1";
	
	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;
}

Function liste_perso()
{
	$sql="SEKECT * FROM perso";

	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;
}
// Recherche clients
Function search_perso($prenom,$profession)
{
	$sql="SELECT * FROM `perso` 
	WHERE `perso`.`PRENOMNOM` LIKE '".$prenom."' OR `perso`.`PROFESSION` LIKE '".$profession."'
	AND `perso`.`MEMBRE` = '1'
	ORDER BY `perso`.NumClient";

	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;
}
// nombre clients
function compteurper()
{
	$sql="SELECT COUNT(*) AS nbr FROM `perso`";
	
	$ga_conn=ga_connexion();
	$exe=mysqli_query($ga_conn,$sql);
	return $exe;
}
?>

