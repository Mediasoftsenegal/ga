
<?php
	
	function connexion()
		{
			$servername = 'localhost';
			$username = 'groupe10_groupeal';
			$password = 'Alpages@2017';
			$db='groupe10_alp';
		
			// Create connection
			$conn = mysqli_connect($servername,$username,$password,$db);
			// Check connection
			if (!$conn) 
				{
				die("Echec de Connexion: " . mysqli_connect_error());
				} 	 
			else 
				{
				echo 'Connexion reussie à la Base de donnéees'.'<br>';
				}
			mysqli_select_db($conn,$db);
			return $conn;
		}
	
	function fermer_connexion($conn)
		{
			mysqli_close($conn);
		}
	// TRAITEMENT
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
		{
			$theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

				switch ($theType) 
					{
					case "text":
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;    
					
					case "long":
					
					case "int":
					  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
					break;
					
					case "double":
					  $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
					break;
					
					case "date":
					  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					  break;
					
					case "defined":
					  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
					  break;
					}
				return $theValue;
			}
	//SITES
	function edit_sites($nval)
		{
			$sql="SELECT * from `gs_sites` where `id_site`='$nval'";	
			
			$conn=connexion();
			$exe=mysqli_query($conn,$sql) or die(mysqli_error());
			return $exe;
		}	
	function liste_sites2($un,$deux)
		{
			$sql="SELECT * FROM `gs_sites` ORDER BY  `gs_sites`.`id_site` limit $un,$deux";	
		
			$conn=connexion();
			$exe=mysqli_query($conn,$sql) or die(mysqli_error());
			return $exe;
		}
	
	function supprime($nval)
		{
			$sql="DELETE FROM `gs_sites` WHERE `gs_sites`.`id_site`='$nval'";
			
			$conn=connexion();
			$exe=mysqli_query($conn,$sql) or die(mysqli_error());
			return $exe;
		}
	
	function compteur()
		{
			$sql='SELECT count(*) as TOTAL  FROM `gs_sites`';

			$conn=connexion();
			$exe=mysqli_query($conn,$sql) or die(mysqli_error());
			return $exe;
			
		}
	
	function repart_site()
		{
			$sql='SELECT `region`, COUNT(*) as tot FROM `gs_sites`GROUP BY `region` ORDER BY tot DESC';
			
			$conn=connexion();
			$exe=mysqli_query($conn,$sql) or die(mysqli_error());
			return $exe;
			
		}
	
	function max_site()
		{
			$sql='SELECT `region`,MAX(`Longitude`)as MAX, MIN(`Latitude`)as MIN FROM `gs_sites`GROUP BY `region`';
			
			$conn=connexion();
			$exe=mysqli_query($conn,$sql) or die(mysqli_error());
			return $exe;
		}
	
	function liste_site($site,$Long,$Lat)
		{
			
				// 1er site non vide, lat non vide, Long non vide
				if (!empty($site)&& !empty($Long)&& !empty($Lat))
				{
					$sql="SELECT * from `gs_sites` WHERE `gs_sites`.`nomsite`='$site' OR `gs_sites`.`Longitude`='$Long' OR`gs_sites`.`Latitude`='$Lat' ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
				// 2eme site non vide, Long vide, lat vide
				if (!empty($site)&& empty($Long)&& empty($Lat))
				{
					$sql="SELECT * from `gs_sites` WHERE `gs_sites`.`nomsite`='$site' 
					ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
				// site non vide, Long non vide, lat vide
				if (!empty($site)&& !empty($Long)&& empty($Lat)) 
				{
					$sql="SELECT * from `gs_sites` WHERE `gs_sites`.`nomsite`='$site' AND `gs_sites`.`Longitude`='$Long'  ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
				// site non vide, Long  vide, lat non vide
				if (!empty($site)&& !empty($Long)&& empty($Lat)) 
				{
					$sql="SELECT * from `gs_sites` WHERE `gs_sites`.`nomsite`='$site' AND `gs_sites`.`Longitude`='$Long'  ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
				// site vide, Long non vide, lat non vide
				if (empty($site)&& !empty($Long)&& !empty($Lat))
				{
					$sql="SELECT * from `gs_sites` WHERE`gs_sites`.`Longitude`='$Long' OR`gs_sites`.`Latitude`='$Lat' ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
				// site vide, Long non vide, lat vide
				if (!empty($site)&& empty($Long)&& !empty($Lat))
				{
					$sql="SELECT * from `gs_sites` WHERE `gs_sites`.`nomsite`='$site' AND `gs_sites`.`Latitude`='$Lat'  ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
				// site vide, Long vide, lat vide
				if (empty($site)&& empty($Long)&& !empty($Lat))
				{
					$sql="SELECT * from `gs_sites`  WHERE `gs_sites`.`Latitude`= '$Lat' ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
				// site vide, Long vide, lat vide
				if (empty($site)&& !empty($Long)&& empty($Lat))
				{
					$sql="SELECT * from `gs_sites`  WHERE `gs_sites`.`Longitude`= '$Long' ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
				if (empty($site)&& empty($Long)&& empty($Lat))
				{
					$sql="SELECT * from `gs_sites` ORDER BY `gs_sites`.`nomsite` ASC" ;	
				}
			
			$conn=connexion();
			$exe=mysqli_query($conn,$sql) or die(mysqli_error());
			return $exe;
		}
		
	function recherche($site,$Long,$Lat)
		{
			$sql="SELECT * from `gs_sites` WHERE `gs_sites`.`nomsite`='$site' OR `gs_sites`.`Longitude`='$Long' OR`gs_sites`.`Latitude`='$Lat' ORDER BY `gs_sites`.`nomsite`" ;	
			
			$conn=connexion();
			$exe=mysqli_query($conn,$sql) or die(mysqli_error());
			return $exe;
		}	
	
	// Décompte 
	function getsites()
		{
			$sql='SELECT * from gs_sites';	
			
			$conn=connexion();
			$exes=mysqli_query($conn,$sql) or die(mysqli_error());
			$exe= mysqli_num_rows($exes);
			return $exe;
		}
	
	function gettypesond()
		{
			$sql='SELECT`Type_s`, COUNT(*) FROM `gs_sites`GROUP BY `Type_s';	
			
			$conn=connexion();
			$exe= mysqli_query($conn,$sql);
			return $exe;
		}
	
	function getIdsondage()
		{
			$sql='SELECT`ID_sondages`, COUNT(*) FROM `gs_sites`GROUP BY `ID_sondages`';
			
			$conn=connexion();
			$exe= mysqli_query($conn,$sql);
			return $exe;
		}
	function last_site()
		{
			$sql="SELECT * FROM `gs_sites` LIMIT 5";
			
			$conn=connexion();
			$exe= mysqli_query($conn,$sql);
			return $exe;
		
		}
	
	function insert_site($nomsite,$region,$ID_sondages,$Coord_X,$Coord_Y,$Longitude,$Latitude,$Coeff_comp,$Press_conso,$Press_gonfl,$ccnom_etudie,$profondeurtot,$type_sol,
	$Type_fondation,$radiergeneralELS,$radiergeneralELU,$fondation_profonde,$Tassement,$Coeff_reaction,$liquidite,$plasticitewp,$plasticiteIP,$limNonetudie,$presence_karst,$faille,
	$presence,$agressivite,$profondeurnapp,$cohesion_KPa,$Angle_frotte,$dhumide,$dseche,$poids_volum,$Autres_caract_phy,$remark)
	{
		$sql="INSERT INTO `gs_sites` (`id_site`,`nomsite`,`region`,`ID_sondages`,`Coord_X`,`Coord_Y`,`Longitude`,`Latitude`,`Coeff_comp`,`Press_conso`,`Press_gonfl`,	`ccnom_etudie`,`profondeurtot`,`type_sol`,`Type_fondation`,`radiergeneralELS`,`radiergeneralELU`,`SemelleslELS`,`SemelleslELU`,`fondation_profonde`,`Tassement`,`Coeff_reaction`,`liquidite`,`plasticitewp`,`plasticiteIP`,`limNonetudie`,`presence_karst`,`faille`,`presence`,`agressivite`,`profondeurnapp`,`cohesion_KPa`,`Angle_frotte`,	`dhumide`,`dseche`,`poids_volum`,`Autres_caract_phy`,`remark`)VALUES ('', '".GetSQLValueString($nomsite,'text')."','".GetSQLValueString($region,'text')."','".$ID_sondages."', '".$Coord_X."', '".$Coord_Y."','".$Longitude."','".$Latitude."', '".$Coeff_comp."','".$Press_conso."','".$Press_gonfl."','".$ccnom_etudie."','".$profondeurtot."','".GetSQLValueString($type_sol,'txt')."','".GetSQLValueString($Type_fondation,'text')."','".$radiergeneralELS."','".$radiergeneralELU."','".$SemelleslELS."','".$SemelleslELU."','".$fondation_profonde."','".$tassement."','".$Coeff_reaction."','".$liquidite."','".$plasticitewp."','".$plasticiteIP."','".GetSQLValueString($limNonetudie,'text')."','".GetSQLValueString($presence_karst,'text')."','".$faille."','".$presence."','".$agressivite."','".$profondeurnapp."','".$cohesion_KPa."','".GetSQLValueString($Angle_frotte,'text')."','".$dhumide."','".$dseche."','".$poids_volum."','".GetSQLValueString($Autres_caract_phy,'text')."','".GetSQLValueString($remark,'text')."')";
	
		$conn=connexion();
		$exe= mysqli_query($conn,$sql);
		return $exe;
	}
?>
	