<?

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

Function sautligne($fic)
{
  $lachaine=str_replace(".","<br>",$fic);
  return $lachaine;

} 
Function sautpoint($fic)
{
  $lachaine=str_replace(",","<br>",$fic);
  return $lachaine;

}
Function sautlignes($fic)
{
  $lachaine=str_replace("--","<br>",$fic);
  return $lachaine;

} 
function nbtotal($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');

    $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT,SUM(TEMPS_EXTER) AS EXTRN,SUM(TEMPS_BUREAU) AS BUR,SUM(KMTRANSPORT) AS TOTKM,
	SUM(NBRETRANSPORT) AS NBRETRANS,SUM(NBREPERDIEM) AS NBPER,SUM(DERNIERJOUR) AS DERJR,SUM(MTFRAISDIVERS) AS FRAIIS,SUM(AVANCES) AS TOTAVANCE, 
	SUM(MT_LOCATION) AS LOCATION,SUM(NBREPAS) AS BREPAS,SUM(NBRENUITE) AS NUITE FROM carnets
	WHERE carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
	while($donnees = $reponse->fetch()){
	 $rest=$donnees[''];
   }
   return $rest;
}
// nombre de repas	
function nbtotalrep($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');

    $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(NBREPAS) AS BREPAS FROM carnets
	WHERE carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
   while($donnees = $reponse->fetch()){
		 
	$restrep=$donnees['BREPAS'];
   }
	return $restrep;
	
}
// nombre de nuités	
function nbtotalnuite($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');

    $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(NBRENUITE) AS NUITE FROM carnets
	WHERE carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
   while($donnees = $reponse->fetch()){
		 
	$restnui=$donnees['NUITE'];
   }
	return $restnui;
}
// nombre de kilometres	
function nbtotalkm($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');

    $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(KMTRANSPORT) AS TOTKM FROM carnets
	WHERE carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
   while($donnees = $reponse->fetch()){
	$restkm=$donnees['TOTKM'];;
   }
	return $restkm;
}
// Forfaits déplacement
function nbtotaldpl($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');

    $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(NBRETRANSPORT) AS NBRETRANS FROM carnets
	WHERE carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
   while($donnees = $reponse->fetch()){
	// nombre de repas								
		 
	$restnbd=$donnees['NBRETRANS'];;
   }
	return $restnbd;
}
// Frais divers 
function nbtotalfrais($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');	

    $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(MTFRAISDIVERS) AS MTFRAIS FROM carnets
	WHERE carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
   while($donnees = $reponse->fetch()){
	// Montant de Frais								
		 
	$restnbfr=$donnees['MTFRAIS'];;
   }
	return $restnbfr;
}
// Afrique jour
function afj($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');	
	
	 $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(NBREPERDIEM) AS NBPER FROM carnets
	WHERE carnets.PERDIEM ='Afrique jour'
	AND carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
	 while($donnees = $reponse->fetch()){								
		 
	$restnper=$donnees['NBPER'];

   }
	return $restnper;
}
// Dernier Afrique jour
function derafj($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');	
	
	 $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(DERNIERJOUR) AS DERJR FROM carnets
	WHERE carnets.PERDIEM ='Afrique jour'
	AND carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
	 while($donnees = $reponse->fetch()){								
		 
	$resderjr=$donnees['DERJR'];
   }
	return $resderjr;
}
// hors afrique jour
function hafj($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');	
	
	 $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(NBREPERDIEM) AS NBPER FROM carnets
	WHERE carnets.PERDIEM ='Hors Afrique jour'
	AND carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
	 while($donnees = $reponse->fetch()){								
		 
	$restnper=$donnees['NBPER'];
   }
	return $restnper;
}
// Dernier jour hors afrique jour
function dhafj($id,$datedeb,$datefin)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');	
	
	 $reponse = $db->query("SELECT carnets.IDPERSONNEL,carnets.DATE_CONTRAT, 
	SUM(DERNIERJOUR) AS HDERJR FROM carnets
	WHERE carnets.PERDIEM ='Hors Afrique jour'
	AND carnets.IDPERSONNEL =$id AND carnets.DATE_CONTRAT BETWEEN '$datedeb' AND '$datefin'");
	
	 while($donnees = $reponse->fetch()){								
		 
	$restnper=$donnees['HDERJR'];
	
   }
	return $restnper;
}
function identifier($nom)
{
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');

	$reponse = $db ->query("SELECT users.IDPERSONNEL FROM users WHERE users.nom_afficher ='$nom'");

	
	while ($donnees =$reponse->fetch()){

		$residpersonnel= $donnees['IDPERONNEL'];
	}
	
	Return $residpersonnel;


}
?>