<?
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
// commmandes

		Function lremplace($lachaine)
		{
			$lach=str_replace("'","\'",$lachaine);
			return $lach;
		}
		
	// ajout 
	
		if(isset($_POST['EXONERETVA'])){
			$EXONERETVA=1;}
			else {$EXONERETVA=0;}

		if(isset($_POST['PRECOMPTETVA'])){
			$PRECOMPTETVA=1;}
		else {$PRECOMPTETVA=0;}
	
		if(isset($_POST['modif_come'])){
			
			//$IDCOMMANDES=$_POST['IDCOMMANDES'];
			$NUMCOMMANDE=$_POST['NUMCOMMANDE'];		
			$IDOFFRES=$_POST['IDOFFRES'];			
			$DATECOMMANDE=$_POST['DATECOMMANDE'];		
			$MONTANTHONOTAIRE=$_POST['MONTANTHONORAIRE'];		
			$DATEDEMARRAGE=$_POST['DATEDEMARRAGE'];			
			$DUREE=$_POST['DUREE'];			
			$NUMAFFAIRE=$_POST['NUMAFFAIRE'];			
			$ADRESSEFACTURATION="'".lremplace($_POST['ADRESSEFACTURATION'])."'";			
			$TYPEINTERVENTION="'".$_POST['TYPEINTERVENTION']."'";
			
			
			
			$sql = "INSERT INTO `commandes`(NUMCOMMANDE,IDOFFRES,DATECOMMANDE,MONTANTHONOTAIRE,DATEDEMARRAGE,DUREE,NUMAFFAIRE,ADRESSEFACTURATION,EXONERETVA,
			PRECOMPTETVA,TYPEINTERVENTION)VALUES (:NUMCOMMANDE,:IDOFFRES,:DATECOMMANDE,:MONTANTHONORAIRE,:DATEDEMARRAGE,:DUREE,:NUMAFFAIRE,:ADRESSEFACTURATION,:EXONERETVA,
			:PRECOMPTETVA,:TYPEINTERVENTION)";
			
			$res = $db->prepare($sql);
			$exe = $res->execute(array(":NUMCOMMANDE"=>$NUMCOMMANDE,":IDOFFRES"=>$IDOFFRES,":DATECOMMANDE"=>$DATECOMMANDE,":MONTANTHONORAIRE"=>$MONTANTHONORAIRE,":DATEDEMARRAGE"=>$DATEDEMARRAGE,":DUREE"=>$DUREE,":NUMAFFAIRE"=>$NUMAFFAIRE,":ADRESSEFACTURATION"=>$ADRESSEFACTURATION,":EXONERETVA"=>$EXONERETVA,":PRECOMPTETVA"=>$PRECOMPTETVA,":TYPEINTERVENTION"=>$TYPEINTERVENTION));
			
			if($exe){
            header('location:commandes.php');
			}else{
            echo "Échec de l'opération d'insertion";
			}
		}
	//modif,
		if(isset($_POST['EXONERETVA'])){
			$EXONERETVA=1;}
		else { $EXONERETVA=0;}
		if(isset($_POST['PRECOMPTETVA'])){
			$PRECOMPTETVA=1;}
		else {$PRECOMPTETVA=0;}
		if(isset($_POST['modif_com'])){			
			$IDCOMMANDES=$_POST['IDCOMMANDES'];
			$NUMCOMMANDE="'".$_POST['NUMCOMMANDE']."'";
			$IDOFFRES=$_POST['IDOFFRES'];
			$DATECOMMANDE="'".$_POST['dateacquisition']."'";
			$MONTANTHONOTAIRE=$_POST['Montant_honoraire'];
			$DATEDEMARRAGE="'".$_POST['DATEDEMARRAGE']."'";
			$DUREE="'".$_POST['duree']."'";
			$NUMAFFAIRE="'".$_POST['NUMAFFAIRE']."'";
			$ADRESSEFACTURATION="'".lremplace($_POST['ADRESSEFACTURATION'])."'";
			
			$TYPEINTERVENTION=$_POST['typeintervention'];
			
			 $sql = "UPDATE `commandes` SET `NUMCOMMANDE`=".$NUMCOMMANDE.",`IDOFFRES`=".$IDOFFRES.",`DATECOMMANDE`=".$DATECOMMANDE.",`MONTANTHONOTAIRE`=".$MONTANTHONOTAIRE.",`DATEDEMARRAGE`=".$DATEDEMARRAGE.",`duree`=".$DUREE.",`NUMAFFAIRE`=".$NUMAFFAIRE.",`ADRESSEFACTURATION`=".$ADRESSEFACTURATION.",`EXONERETVA`=".$EXONERETVA.",`PRECOMPTETVA`=".$PRECOMPTETVA." WHERE  IDCOMMANDES = ".$_POST['IDCOMMANDES']."";
			 

			$res = $db->prepare($sql);
			$exe = $res->execute([$NUMCOMMANDE,$IDOFFRES,$DATECOMMANDE,$MONTANTHONOTAIRE,$DATEDEMARRAGE,$DUREE,$NUMAFFAIRE,$ADRESSEFACTURATION,$EXONERETVA,$PRECOMPTETVA,$IDCOMMANDES]);
			
			
			if($exe){
				header('location:commandes.php');
			}else{
				echo "Échec de l'opération de modification";
			}
			
		}
	// Supp
	if(isset($_POST['supp_com'])){
			
			$sql = "DELETE FROM `commandes` WHERE IDCOMMANDES=".$_POST['IDCOMMANDES'];
			
			$res = $db->prepare($sql);
			$exe = $res->execute([$IDCOMMANDES]);
			
			if($exe){
				header('location:commandes.php');
			}else{
				echo "Échec de l'opération de suppression";
			}
		}
?>