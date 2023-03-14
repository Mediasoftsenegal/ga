<? 
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');


// Ajout user
if(isset($_POST['yonde'])){

	$reg=explode('/', $_POST['idpersonnel']);
    $nomafficher=$reg[1];
    $login=$_POST['login'];
    $mdp=md5($_POST['password']);
    $profil=$_POST['profil'];
	$idpersonnel =$reg[0];
	$office = $_POST['office'];
   
    $sql = "INSERT INTO `users`(`nom_afficher`, `login`, `password`, `profil`,`IDPERSONNEL`,`office`) 
    VALUES (:nom_afficher,:login,:password,:profil,:IDPERSONNEL,:office)";

    $res = $db->prepare($sql);
    $exe = $res->execute(array(":nom_afficher"=>$nomafficher ,":login"=>$login,":password"=>$mdp,":profil"=>$profil,":IDPERSONNEL"=>$idpersonnel,
	":office"=>$office));

    //var_dump($exe) ;
    if($exe){
        header('location:user.php');
    }else{
        echo "Échec de l'opération d'insertion";
    }
}
// Ajout vehicule
if(isset($_POST['yondeau'])){

    $idpersonnel=$_POST['IDPERSONNEL'];
    $couleur="'".$_POST['couleur']."'";
    $num_immat="'".$_POST['num_immat']."'";
    $date_immat="'".$_POST['Date_immat']."'";
    $Num_titulaire="'".$_POST['Num_titulaire']."'";
    $Prenomnom_titulaire="'".$_POST['Prenomnom_titulaire']."'";
    $Adresse="'".$_POST['adresse']."'";
    $region="'".$_POST['region']."'";
    $departement="'".$_POST['departement']."'";
    $Commune="'".$_POST['Commune']."'";
    $origine_cmc="'".$_POST['origine_cmc']."'";
    $num_cmc="'".$_POST['num_cmc']."'";
    $date_cmc="'".$_POST['date_cmc']."'";
    $Date_1eremc="'".$_POST['Date_1eremc']."'";
    $Precedente_imm="'".$_POST['Precedente_imm']."'";
    $Date_precedente_imm="'".$_POST['Date_precedente_imm']."'";
    $genre="'".$_POST['genre']."'";
    $marque="'".$_POST['marque']."'";
    $Carosserie="'".$_POST['Carosserie']."'";
    $Nom_vehicule="'".$_POST['Nom_vehicule']."'";
    $type_veh="'".$_POST['type_veh']."'";
    $num_serie="'".$_POST['num_serie']."'";
    $energie="'".$_POST['energie']."'";
    $puissance="'".$_POST['puissance']."'";
    $Cylindree="'".$_POST['Cylindree']."'";
    $placesassises="'".$_POST['placesassises']."'";
    $PTRA="'".$_POST['PTRA']."'";
    $PTAC="'".$_POST['PTAC']."'";
    $PV="'".$_POST['PV']."'";
    $CU="'".$_POST['CU']."'";
    $Type_vehicule="'".$_POST['Type_vehicule']."'";
    $Concessionnaire="'".$_POST['Concessionnaire']."'";
    $categorie="'".$_POST['categorie']."'";
    $Tauxkm=$_POST['Tauxkm'];
    $Forfaits_deplacement=$_POST['Forfaits_deplacement'];
    
    
    $sql = "INSERT INTO `vehicules`(`IDPERSONNEL`,`couleur`,`num_immat`,
    `Date_immat`,`Num_titulaire`,`Prenomnom_titulaire`,`Adresse`,
   `region`,`departement`,`Commune`,`origine_cmc`,`num_cmc`,
    `date_cmc`,`Date_1eremc`,`Precedente_imm`,`Date_precedente_imm`,
   `genre`,`marque`,`Carosserie`,`Nom_vehicule`,`type_veh`,`num_serie`,
    `energie`,`puissance`,`Cylindree`,`placesassises`,`PTRA`,`PTAC`,`PV`,
    `CU`,`Type_vehicule`,`Concessionnaire`,`categorie`,`Tauxkm`,
    `Forfaits_deplacement`) 
    VALUES (:IDPERSONNEL,:couleur,:num_immat,:Date_immat,
    :Num_titulaire,:Prenomnom_titulaire,:Adresse,
   :region,:departement,:Commune,:origine_cmc,:num_cmc,
   :date_cmc,:Date_1eremc,:Precedente_imm,:Date_precedente_imm,
   :genre,:marque,:Carosserie,:Nom_vehicule,:type_veh,:num_serie,
   :energie,:puissance,:Cylindree,:placesassises,:PTRA,:PTAC,:PV,
   :CU,:Type_vehicule,:Concessionnaire,:categorie,:Tauxkm,
   :Forfaits_deplacement)";


    $res = $db->prepare($sql);
    $exe = $res->execute(array(":IDPERSONNEL"=>$idpersonnel, 
    ":couleur"=>$couleur,
    ":num_immat"=>$num_immat,
    ":Date_immat"=>$Date_immat,
    ":Num_titulaire"=>$Num_titulaire,
    ":Prenomnom_titulaire"=>$Prenomnom_titulaire,
    ":Adresse"=>$Adresse,
    ":region"=>$region,
    ":departement"=>$departement,
    ":Commune"=>$Commune,
    ":origine_cmc"=>$origine_cmc,
    ":num_cmc"=>$num_cmc,
    ":date_cmc"=>$date_cmc,
    ":Date_1eremc"=>$Date_1eremc,
    ":Precedente_imm"=>$Precedente_imm,
    ":Date_precedente_imm"=>$Date_precedente_imm,
    ":genre"=>$genre,
    ":marque"=>$marque,
    ":Carosserie"=>$Carosserie,
    ":Nom_vehicule"=>$Nom_vehicule,
    ":type_veh"=>$type_veh,
    ":num_serie"=>$num_serie,
    ":energie"=>$energie,
    ":puissance"=>$puissance,
    ":Cylindree"=>$Cylindree,
    ":placesassises"=>$placesassises,
    ":PTRA"=>$PTRA,
    ":PTAC"=>$PTAC,
    ":PV"=>$PV,
    ":CU"=>$CU, 
    ":Type_vehicule"=>$Type_vehicule,
    ":Concessionnaire"=>$Concessionnaire,
    ":categorie"=>$categorie,
    ":Tauxkm"=>$Tauxkm,
    ":Forfaits_deplacement"=>$Forfaits_deplacement));

    //var_dump($exe) ;
    if($exe){
        
        header('location:auto.php');
    }else{
        
        echo "Échec de l'opération d'insertion";
    }
}
// Ajout Forfaits

if(isset($_POST['yondefo'])){

    $periode=$_POST['nperiod'];
    $taux_repasing=$_POST['taux_repasing'];
    $taux_repasins=$_POST['taux_repasins'];
    $forfait_nuite = $_POST['forfait_nuite'];
    $forfait_afriquejour = $_POST['forfait_afriquejour'];
    $forfait_afriquejourder = $_POST['afrik_last_day'];
    $forfait_horsafrique=$_POST['forfait_horsafrique'];
    $forfait_horsafriquejourder=$_POST['forfait_horsafriquejourder'];
  
    $sql = "INSERT INTO taux_missions (periode, taux_repasing, taux_repasins, forfait_nuite, forfait_afriquejour, forfait_afriquejourder, forfait_horsafrique, forfait_horsafriquejourder) VALUES (:periode, :taux_repasing, :taux_repasins, :forfait_nuite, :forfait_afriquejour, :forfait_afriquejourder, :forfait_horsafrique, :forfait_horsafriquejourder)";
    
    $res = $db->prepare($sql);
    $exe = $res->execute(array(
        ":periode" => $periode,
        ":taux_repasing" => $taux_repasing,
        ":taux_repasins" => $taux_repasins,
        ":forfait_nuite" => $forfait_nuite,
        ":forfait_afriquejour" => $forfait_afriquejour,
        ":forfait_afriquejourder" => $forfait_afriquejourder,
        ":forfait_horsafrique" => $forfait_horsafrique,
        ":forfait_horsafriquejourder" => $forfait_horsafriquejourder
    ));

    if($exe){
        header('location:forfaits.php');
    }else{
       echo "Échec de l'opération d'insertion";
    }
}

// Update user
if(isset($_POST['sopi'])){

	$reg=explode('/', $_POST['idpersonnel']);
    $nomafficher=$reg[1];
    $id=$_POST['id_user'];
//	echo 'id : '.$id.'<br>';
//	echo 'nomafficher : '.$nomafficher.'<br>';
    $login=$_POST['login'];
//	echo 'login : '.$login.'<br>';
    $mdp=md5($_POST['password']);
//	echo 'mdp : '.$mdp.'<br>';
    $profil=$_POST['profil'];
//	echo 'profil : '.$profil.'<br>';
	$idpersonnel =$reg[0];
//	echo 'idpersonnel : '.$idpersonnel.'<br>';
	
    $sql = "UPDATE `users` SET `nom_afficher`=?, `login`=?, `password`=?, `profil`=? , `IDPERSONNEL`=?, `office`=?
    WHERE id_user =$id";
 //   echo $sql; 
    $res = $db->prepare($sql);
    $exe = $res->execute([$nomafficher,$login,$mdp,$profil,$idpersonnel,$office]);   
    
    if($exe){
        header('location:user.php');
    }else{
        echo "Échec de l'opération de modification";
    }
}
// delete
if(isset($_POST['dindi'])){

    $id=$_POST['id_user'];

    $sql="DELETE FROM `users` WHERE id_user=$id";
    $res = $db->prepare($sql);
    $exe = $res->execute();

    if($exe){
        header('location:user.php');
    }else{
        echo "Échec de l'opération de suppression";
    }
}
?>