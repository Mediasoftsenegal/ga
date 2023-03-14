<?php
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
 
 Function lchaine($lachaine){
	 
	 $lach= str_replace("'","\'",$lachaine);
	 return $lach;
 }


//Client
    #Insert
    if(isset($_POST['bt_client'])){
        if(empty($_POST['ExonereTVA'])){
            $ExonereTVA = 0;
        }else{
            $ExonereTVA = 1;
        }
        if(empty($_POST['PrecompteTVA'])){
            $PrecompteTVA = 0;
        }else{
            $PrecompteTVA = 1;
        }
        $NumClient = $_POST['NumClient'];
        $Societe = $_POST['Societe'];
        $Civilite = $_POST['Civilite'];
        $Prenom_s_et_nom = $_POST['Prenom_s_et_nom'];
        $Adresse = "'".$_POST['Adresse']."'";
        $Statut = $_POST['Statut'];
        $Mail = $_POST['Mail'];
        $Mobile = $_POST['Mobile'];
        $Fixe = $_POST['Fixe'];
        $Fax = $_POST['Fax'];
        $Bp = $_POST['Bp'];
        $Ville = $_POST['Ville'];
        $Type = $_POST['Type'];
        $Etat_contact = $_POST['Etat_contact'];
        $Causes = $_POST['Causes'];
        $Decisions = $_POST['Decisions'];
        $Observations = $_POST['Observations'];

		$sql = "INSERT INTO `clients`(`NUMCLIENT`, `SOCIETE`, `CIVILITE`, `PRENOM_NOM`, `TYPECONTACT`, `ADRESSE`, `STATUT`, `MAIL`, `EXONERETVA`, `PRECOMPTETVA`, `MOBILE`, `FIXE`, `BUREAU`, `BP`, `VILLE`, `OBSERVATIONS`, `ETATCONT`, `CAUSES`, `DECISIONS`) VALUES (:NUMCLIENT,:SOCIETE,:CIVILITE,:PRENOM_NOM,:TYPECONTACT,:ADRESSE,:STATUT,:MAIL,:EXONERETVA,:PRECOMPTETVA,:TELMOBILE,:FAX,:TELBUREAU,:BP,:VILLE,:OBSERVATIONS,:ETATCONT,:CAUSES,:DECISIONS)";

        $res = $db->prepare($sql);
        $exe = $res->execute(array(":CIVILITE"=>$Civilite ,":PRENOM_NOM"=>$Prenom_s_et_nom,":ADRESSE"=>$Adresse,":MAIL"=>$Mail,":TELMOBILE"=>$Mobile,":FAX"=>$Fax,":TELBUREAU"=>$Fixe ,":BP"=>$Bp,":VILLE"=>$Ville,":OBSERVATIONS"=>$Observations,":TYPECONTACT"=>$Type,":SOCIETE"=>$Societe,":NUMCLIENT"=>$NumClient,":EXONERETVA"=>$ExonereTVA ,":STATUT"=>$Statut,":PRECOMPTETVA"=>$PrecompteTVA,":ETATCONT"=>$Etat_contact,":CAUSES"=>$Causes,":DECISIONS"=>$Decisions));
        if($exe){
            header('location:client.php');
        }else{
            echo "Échec de l'opération d'insertion";
        }
    }
    #Modif
    if(isset($_POST['modifclient'])){
        if(empty($_POST['exoneretva'])){
            $ExonereTVA = 0;
        }else{
            $ExonereTVA = 1;
        }
        if(empty($_POST['precomptetva'])){
            $PrecompteTVA = 0;
        }else{
            $PrecompteTVA = 1;
        }
        $NumClient = $_POST['NumClient'];
        $Societe = $_POST['Societe'];
		$civilite =$_POST['Civilite'];
        $Prenom_nom = $_POST['Prenom_s_et_nom'];
        $Adresse = $_POST['Adresse'];
		$Ville = $_POST['Ville'];		
        $Statut = $_POST['Statut'];
        $Mail = $_POST['Mail'];
        $Mobile = $_POST['Mobile'];
        $Fixe = $_POST['Fixe']."'";
        $bureau = $_POST['Fax'];
        $Bp = $_POST['Bp'];
        $Type = $_POST['Type'];
        $Etat_contact = "'".$_POST['Etat_contact'];
        $Causes = $_POST['Causes'];
        $Decisions = $_POST['Decisions'];
        $Observations = $_POST['Observations'];
        $id = $_POST['IDCONTACTS'];
		
        $sql = "UPDATE clients SET `NUMCLIENT`=?,`SOCIETE`=?,`PRENOM_NOM`=?,`TYPECONTACT`=?,`ADRESSE`=?,`STATUT`=?,`MAIL`=?,`EXONERETVA`=?,`PRECOMPTETVA`=?,`MOBILE`=?,`FIXE`=?,`BUREAU`=?,`BP`=?,`VILLE`=?,`OBSERVATIONS`=?,`ETATCONT`=?,`CAUSES`=?,`DECISIONS`=? WHERE IDCONTACTS=$id";
		//echo $sql;
        $res = $db->prepare($sql);
        $exe = $res->execute([$NumClient,$Societe,$Prenom_nom,$Type,$Adresse,$Statut,$Mail,$ExonereTVA,$PrecompteTVA,$Mobile,$Fixe,$bureau,$Bp,$Ville,$Observations,$Etat_contact,$Causes,$Decisions]);

        if($exe){
            header('location:client.php');
        }else{
            echo "Échec de l'opération de modification !";
        }
    }
	 #DELETE
		 
	    if(isset($_POST['dindi_client'])){
			$id=$_POST['IDCONTACTS'];
			$sql= "DELETE From  clients WHERE IDCONTACTS=$id";
			$res = $db->prepare($sql);
			 $exe = $res->execute([$id ]);
			 
			  if($exe){
            header('location:client.php');
        }else{
            echo "Échec de l'opération de modification !";
        }

		}	 
	
	?>