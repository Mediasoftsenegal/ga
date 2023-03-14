<?php
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
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
        $Adresse = $_POST['Adresse'];
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

        //$sql = "INSERT INTO `clients`(`CIVILITE`, `PRENOM_NOM`, `ADRESSE`, `MAIL`, `TELMOBILE`, `FAX`, `TELBUREAU`, `BP`, `VILLE`, `OBSERVATIONS`, `TYPECONTACT`, `SOCIETE`, `NUMCLIENT`, `EXONERETVA`, `STATUT`, `PRECOMPTETVA`, `ETATCONT`, `CAUSES`, `DECISIONS`) VALUES (:CIVILITE,:PRENOM_NOM,:ADRESSE,:MAIL,:TELMOBILE,:FAX,:TELBUREAU,:BP,:VILLE,:OBSERVATIONS,:TYPECONTACT,:SOCIETE,:NUMCLIENT,:EXONERETVA,:STATUT,:PRECOMPTETVA,:ETATCONT,:CAUSES,:DECISIONS)";
		$sql = "INSERT INTO `clients`(`NUMCLIENT`, `SOCIETE`, `CIVILITE`, `PRENOM_NOM`, `TYPECONTACT`, `ADRESSE`, `STATUT`, `MAIL`, `EXONERETVA`, `PRECOMPTETVA`, `MOBILE`, `FIXE`, `BUREAU`, `BP`, `VILLE`, `OBSERVATIONS`, `ETATCONT`, `CAUSES`, `DECISIONS`) VALUES (:NUMCLIENT,:SOCIETE,:CIVILITE,:PRENOM_NOM,:TYPECONTACT,:ADRESSE,:STATUT,:MAIL,:EXONERETVA,:PRECOMPTETVA,:TELMOBILE,:FAX,:TELBUREAU,:BP,:VILLE,:OBSERVATIONS,:ETATCONT,:CAUSES,:DECISIONS)";
		
		//echo $sql ;
        $res = $db->prepare($sql);
        $exe = $res->execute(array(":CIVILITE"=>$Civilite ,":PRENOM_NOM"=>$Prenom_s_et_nom,":ADRESSE"=>$Adresse,":MAIL"=>$Mail,":TELMOBILE"=>$Mobile,":FAX"=>$Fax,":TELBUREAU"=>$Fixe ,":BP"=>$Bp,":VILLE"=>$Ville,":OBSERVATIONS"=>$Observations,":TYPECONTACT"=>$Type,":SOCIETE"=>$Societe,":NUMCLIENT"=>$NumClient,":EXONERETVA"=>$ExonereTVA ,":STATUT"=>$Statut,":PRECOMPTETVA"=>$PrecompteTVA,":ETATCONT"=>$Etat_contact,":CAUSES"=>$Causes,":DECISIONS"=>$Decisions));
		//var_dump($exe) ;
        if($exe){
            header('location:client.php');
        }else{
            echo "Échec de l'opération d'insertion";
        }
    }
    #Modif
    if(isset($_POST['modifcl'])){
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
        $NumClient = $_POST['numclient'];
        $Societe = $_POST['societe'];
        $Prenom_nom = $_POST['prenom_nom'];
        $Adresse = $_POST['adresse'];
        $Statut = $_POST['statut'];
        $Mail = $_POST['mail'];
        $Mobile = $_POST['mobile'];
        $Fixe = $_POST['fixe'];
        $bureau = $_POST['bureau'];
        $Bp = $_POST['bp'];
        $Ville = $_POST['ville'];
        $Type = $_POST['typecontact'];
        $Etat_contact = $_POST['etatcont'];
        $Causes = $_POST['causes'];
        $Decisions = $_POST['decisions'];
        $Observations = $_POST['observations'];
        $id = $_POST['id'];
        
        $sql = "UPDATE clients SET `NUMCLIENT`=?,`SOCIETE`=?,`PRENOM_NOM`=?,`TYPECONTACT`=?,`ADRESSE`=?,`STATUT`=?,`MAIL`=?,`EXONERETVA`=?,`PRECOMPTETVA`=?,`MOBILE`=?,`FIXE`=?,`BUREAU`=?,`BP`=?,`VILLE`=?,`OBSERVATIONS`=?,`ETATCONT`=?,`CAUSES`=?,`DECISIONS`=? WHERE IDCONTACTS=$id";
        $res = $db->prepare($sql);
        $exe = $res->execute([$NumClient,$Societe,$Prenom_nom,$Type,$Adresse,$Statut,$Mail,$ExonereTVA,$PrecompteTVA,$Mobile,$Fixe,$bureau,$Bp,$Ville,$Observations,$Etat_contact,$Causes,$Decisions]);

        if($exe){
            header('location:client.php');
        }else{
            echo "Échec de l'opération d'insertion";
        }
    }

//Offre
    #Insert
    if(isset($_POST['bt_offre'])){
        $affaire = $_POST['affaire'];
        $montant = $_POST['montant'];
        $id_contact = $_POST['id_contact'];
        $services = $_POST['services'];
        $maitre_oeuvre = $_POST['maitre_oeuvre'];
        $date_acquis = $_POST['dateacquisition'];
        $autre_info = $_POST['autre_infos'];
        $num_offre = $_POST['num_offre'];
        $montant_honoraire = $_POST['Montant_honoraire'];
        $dat=explode("-",$_POST['dateacquisition']);
        $annee = $dat[0];
		$missions =$_POST['missions'];
         
        echo 'Date offre :'.$date_acquis;

        $sql = "INSERT INTO `offres`(`AFFAIRE`, `MONTANT`, `IDCONTACTS`, `SERVICE`, 
        `MAITREOEUVRE`, `DATEACQUISITION`, `AUTRES_INFOS`, `NUMOFFRE`, `MONTANTHONORAIRE`,
        `ANNEE`,`MISSIONS`) VALUES (:AFFAIRE,:MONTANT,:IDCONTACTS,:MAITREOEUVRE,
        :DATEACQUISITION,:AUTRES_INFOS,:NUMOFFRE,:MONTANTHONORAIRE,:ANNEE,:MISSIONS)";
        
        $exe = $res->execute(array(":AFFAIRE"=>$affaire,":MONTANT"=>$montant,
        ":IDCONTACTS"=>$id_contact,":SERVICE"=>$services,":MAITREOEUVRE"=>$maitre_oeuvre,
        ":DATEACQUISITION"=>$date_acquis,":AUTRES_INFOS"=>$autre_info,":NUMOFFRE"=>$num_offre,
        ":MONTANTHONORAIRE"=>$montant_honoraire,":ANNEE"=>$annee,":MISSIONS"=>$missions));

        if($exe){
            header('location:offres.php');
        }else{
            echo "Échec de l'opération d'insertion";
        }
    }
	// Modif offre 
	  if(isset($_POST['modifoff'])){
		  
		  $affaire="'".$_POST['AFFAIRE']."'";
		  $montant=$_POST['MONTANT'];
		  $idcontact=$_POST['IDCONTACTS'];
		  $idpersonnel=$_POST['IDPERSONNEL'];
		  $maitreoeuvre="'".$_POST['MAITREOEUVRE']."'";
		  $dateacquisition="'".$_POST['DATEACQUISITION']."'";
		  $autresinfos="'".$_POST['AUTRES_INFOS']."'";
		  $numoffre="'".$_POST['NUMOFFRE']."'";
		  $mthonoraire=$_POST['MONTANTHONORAIRE'];
		  $annee="'".$_POST['ANNEE']."'";
		
	//	$sql = "UPDATE offres SET `AFFAIRE`=?,`MONTANT`=?,`IDCONTACTS`=?,`IDPERSONNEL`=?,`MAITREOEUVRE`=?,`DATEACQUISITION`=?,`AUTRES_INFOS`=?,`NUMOFFRE`=?,`MONTANTHONORAIRE`=?,`ANNEE`=?";
		 
		 $sql = "UPDATE offres SET `AFFAIRE`=".$affaire.",`MONTANT`=".$montant.",`IDCONTACTS`=".$idcontact.",`IDPERSONNEL`=".$idpersonnel.",`MAITREOEUVRE`=".$maitreoeuvre.",`DATEACQUISITION`=".$dateacquisition.",`AUTRES_INFOS`=".$autresinfos.",`NUMOFFRE`=".$numoffre.",`MONTANTHONORAIRE`=".$mthonoraire.",`ANNEE`=".$annee." WHERE 
		 IDOFFRES = ".$_POST['IDOFFRES']."";
		 
		 echo $sql ;
		  
		$res = $db->prepare($sql);
        $exe = $res->execute([$affaire,$montant,$idcontact,$idpersonnel,$maitreoeuvre,$dateacquisition,$autresinfos,$numoffre,$mthonoraire,$mthonoraire,$annee]);

        if($exe){
            header('location:offres.php');
        }else{
            echo "Échec de l'opération de modification";
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