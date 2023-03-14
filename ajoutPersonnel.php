<!DOCTYPE html>
<html>
    <head>
        <title>Ajout Personnel</title>

    </head>
    <body>


        
    <?php
    
   // $servername = '167.114.15.225';
    //$username = 'groupe10_groupeal';
    //$password = 'Alpages@2017';
    //$db='groupe10_alp';
      require ('connexion.php');  
     
     $etat            =$_POST["etat"];
     $prenomnom       =$_POST["prenomnom"];
     $matricule       =$_POST["matricule"];
     $sexe            =$_POST["sexe"];
     $date_naiss      =$_POST["date_naiss"];
     $lieu_naiss      =$_POST["lieu_naiss"];
     $pays            =$_POST["pays"];
     $nationalite     =$_POST["nationalite"];
     $nom_pere        =$_POST["nom_pere"];
     $nom_mere        =$_POST["nom_mere"];
     $groupe_ethnique =$_POST["groupe_ethnique"];
     $religion        =$_POST["religion"];
     $tel_fix         =$_POST["tel_fix"];
     $tel_portable    =$_POST["tel_portable"];
     $adresse         =$_POST["adresse"];
     
     
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$servername;db=$db",$username,$password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("INSERT INTO ga_personnel(etat,prenomnom,matricule,sexe,date_naiss,lieu_naiss,pays,nationalite,nom_pere,nom_mere,groupe_ethnique,religion,tel_fix,tel_portable,adresse) VALUES(:etat,:prenomnom,:matricule,:sexe,:date_naiss,:lieu_naiss,:pays,:nationalite,:nom_pere,:nom_mere,:groupe_ethnique,:religion,:tel_fix,:tel_portable,:adresse)");      
         $sth->bindParam(':etat',$etat);
         $sth->bindParam(':prenomnom',$prenomnom);
         $sth->bindParam(':matricule',$matricule);
         $sth->bindParam(':sexe',$sexe);
         $sth->bindParam(':date_naiss',$date_naiss);
         $sth->bindParam(':lieu_naiss',$lieu_naiss);
         $sth->bindParam(':pays',$pays);
         $sth->bindParam(':nationalite',$nationalite);
         $sth->bindParam(':nom_pere',$nom_pere);
         $sth->bindParam(':nom_mere',$nom_mere);
         $sth->bindParam(':groupe_ethnique',$groupe_ethnique);
         $sth->bindParam(':religion',$religion);
         $sth->bindParam(':tel_fix',$tel_fix);
         $sth->bindParam(':tel_portable',$tel_portable);
         $sth->bindParam(':adresse',$adresse);

        if($sth->execute()){
			return true;
		}
		return falsse;
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>
<?php
header('Location:menu.php?page=tab_pers');
?>
</body>
</html>