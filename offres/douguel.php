<?php
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
$db->exec("SET CHARACTER SET utf8");
 Function lchaine($lachaine){
	 
	 $lach= str_replace("'","\'",$lachaine);
	 return $lach;
 }
 function utf8_xml($string)
 {
   return preg_replace('/[^\x{0009}\x{000a}\x{000d}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}]+/u',
                       ' ', $string);
 }


//Offres
    #Insert
    if(isset($_POST['bt_offre'])){
        $affaire = utf8_xml(lchaine($_POST['AFFAIRE']));
        $montant = $_POST['MONTANT'];
        $id_contact = $_POST['IDCONTACTS'];
        $services = $_POST['services'];
        $maitre_oeuvre = $_POST['MAITREOEUVRE'];
        $date_acquis = $_POST['DATEACQUISITION'];
        $autre_info = $_POST['AUTRES_INFOS'];
        $num_offre = $_POST['NUMOFFRE'];
        $montant_honoraire = $_POST['MONTANTHONORAIRE'];
        $dat=explode("-",$_POST['DATEACQUISITION']);
        $annee = $dat[0];
		$missions =htmlspecialchars($_POST['MISSIONS'], ENT_NOQUOTES, "UTF-8");
		
    

        $sql = "INSERT INTO `offres`(`AFFAIRE`, `MONTANT`, `IDCONTACTS`, `SERVICE`, `MAITREOEUVRE`, `DATEACQUISITION`, `AUTRES_INFOS`, `NUMOFFRE`, `MONTANTHONORAIRE`,`ANNEE`,`MISSIONS`) VALUES (:AFFAIRE,:MONTANT,:IDCONTACTS,:SERVICE,:MAITREOEUVRE,:DATEACQUISITION,:AUTRES_INFOS,:NUMOFFRE,:MONTANTHONORAIRE,:ANNEE,:MISSIONS)";
		
		//echo $sql;
        
        $res = $db->prepare($sql);
        $exe = $res->execute(array(":AFFAIRE"=>$affaire,":MONTANT"=>$montant,":IDCONTACTS"=>$id_contact,":SERVICE"=>$services,":MAITREOEUVRE"=>$maitre_oeuvre,":DATEACQUISITION"=>$date_acquis,":AUTRES_INFOS"=>$autre_info,":NUMOFFRE"=>$num_offre,":MONTANTHONORAIRE"=>$montant_honoraire,":ANNEE"=>$annee,":MISSIONS"=>$missions));

        if($exe){
            header('location:offres.php');
        }else{
            echo "Échec de l'opération d'insertion";
        }
    }
	// Modif offre 
	  if(isset($_POST['modifoff'])){
		  
		  $affaire="'".lchaine($_POST['AFFAIRE'])."'";
		  $montant=$_POST['MONTANT'];
		  $idcontact=$_POST['IDCONTACTS'];
		  $services="'".$_POST['services']."'";
		  $maitreoeuvre="'".$_POST['MAITREOEUVRE']."'";
		  $dateacquisition="'".$_POST['DATEACQUISITION']."'";
		  $autresinfos="'".$_POST['AUTRES_INFOS']."'";
		  $numoffre="'".$_POST['NUMOFFRE']."'";
		  $mthonoraire=$_POST['MONTANTHONORAIRE'];
		  $annee="'".$_POST['ANNEE']."'";
		  $missions = "'".lchaine($_POST['MISSIONS'])."'";	
	//	$sql = "UPDATE offres SET `AFFAIRE`=?,`MONTANT`=?,`IDCONTACTS`=?,`SERVICE`=?,`MAITREOEUVRE`=?,`DATEACQUISITION`=?,`AUTRES_INFOS`=?,`NUMOFFRE`=?,`MONTANTHONORAIRE`=?,`ANNEE`=?";
		 
		 $sql = "UPDATE offres SET `AFFAIRE`=".$affaire.",`MONTANT`=".$montant.",`IDCONTACTS`=".$idcontact.",`SERVICE`=".$services.",`MAITREOEUVRE`=".$maitreoeuvre.",`DATEACQUISITION`=".$dateacquisition.",`AUTRES_INFOS`=".$autresinfos.",
         `NUMOFFRE`=".$numoffre.",`MONTANTHONORAIRE`=".$mthonoraire.",`ANNEE`=".$annee.",
	    `MISSIONS`=".$missions." WHERE IDOFFRES = ".$_POST['IDOFFRES']."";
		 
		// echo $sql ;
		  
		$res = $db->prepare($sql);
        $exe = $res->execute([$affaire,$montant,$idcontact,$services,$maitreoeuvre,$dateacquisition,$autresinfos,
        $numoffre,$mthonoraire,$annee,$_POST['IDOFFRES']]);

        if($exe){
            header('location:offres.php');
        }else{
            echo "Échec de l'opération de modification";
        }
	  }
	  // delete
	   if(isset($_POST['dindi_offre'])){ 
	    $id=$_POST['id_offre'];

		$sql="DELETE FROM `users` WHERE id_user=$id";
		$res = $db->prepare($sql);
		$exe = $res->execute();

		if($exe){
			header('location:user.php');
		}else{
			echo "Échec de l'opération de suppression";
		}
	   }

//Affaire
    #Insert
    if(isset($_POST['bt_affaire'])){
        $idoffres = $_POST['idoffres'];
        $datesignature = $_POST['datesignature'];
        $lieu = $_POST['lieu'];
        $etat = $_POST['etat'];
        $anaff = $_POST['anaff'];
        $observations = $_POST['observations'];
        $client = $_POST['client'];
        $nbrevisitesprev = $_POST['nbrevisitesprev'];
        $nbrevisitesreal = $_POST['nbrevisitesreal'];
        $datefin = $_POST['datefin'];
        $datereprise = $_POST['datereprise'];

        $sql = "INSERT INTO `affaires`(`DATESIGNATURE`, `IDOFFRES`, `LIEU`, `ETAT`, `ANAFF`, `OBSERVATIONS`, `CLIENT`, `NBREVISITESPREV`, `NBREVISITESREAL`, `DATEFIN`, `DATEREPRISE`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $res = $db->prepare($sql);
        $exe = $res->execute([$datesignature,$idoffres,$lieu,$etat,$anaff,$observations,$client,$nbrevisitesprev,$nbrevisitesreal,$datefin,$datereprise]);

        if($exe){
            header('location:affaire.php');
        }else{
            echo "Échec de l'opération d'insertion";
        }
    }