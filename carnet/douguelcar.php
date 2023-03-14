<?
if (isset($_GET['visares'])){
     'visares='.$_GET['visares']; }
else
{	$visares=0;	}	

$sql0 = "INSERT INTO `carnets`(`IDPERSONNEL`, `IDOFFRES`, `SEMAINE`, `DATE_CONTRAT`, `TEMPS_EXTER`, `TEMPS_BUREAU`, `REFERENCE`, `TRANSPORT`, `KMTRANSPORT`, `NBRETRANSPORT`, `JUSTIFTRANS`, `PERDIEM`, `NBREPERDIEM`, `DERNIERJOUR`, `JUSTIFPERDIEM`, `FRAISDIVERS`, `JUSTIFDIVERS`, `MTFRAISDIVERS`, `AVANCES`, `NBREPAS`, `NBRENUITE`, `JUSTIFREPAS`, `JUSTIFNUITE`, `VISAING`, `VISARES`) VALUES (".$_GET['idpersonnel'].",".$_GET['idoffresca'].",".$_GET['semaine'].",".$_GET['date_contrat'].",".$_GET['temps_exter'].",".$_GET['temps_bureau'].",".$_GET['reference'].",".$_GET['transport'].",".$_GET['kmtransport'].",".$_GET['nbretransport'].",".$_GET['justiftrans'].",".$_GET['perdiem'].",".$_GET['nbreperdiem'].",".$_GET['dernierjour'].",".$_GET['justifperdiem'].",".$_GET['fraisdivers'].",".$_GET['justifdivers'].",".$_GET['mtfraisdivers'].",".$_GET['avances'].",".$_GET['nbrepas'].",".$_GET['nbrenuite'].",".$_GET['justifrepas'].",".$_GET['justifnuite'].",".$_GET['visaing'].",".$_GET['visares'].")";        

$idpersonnel = $_GET['idpersonnel'];         
$idoffres = $_GET['idoffresca']; 		        
$semaine = $_GET['semaine'];		        
$date_contrat = $_GET['date_contrat'];		        
$temps_exter = $_GET['temps_exter'];	        
$temps_bureau = $_GET['temps_bureau'];		        
$reference = $_GET['reference'];		        
$transport = $_GET['transport'];	        
$kmtransport = $_GET['kmtransport'];	        
$nbretransport = $_GET['nbretransport'];	        
$justiftrans = $_GET['justiftrans'];	        
$perdiem = $_GET['perdiem'];	        
$nbreperdiem = $_GET['nbreperdiem'];	        
$dernierjour = $_GET['dernierjour'];		        
$justifperdiem = $_GET['justifperdiem'];        
$fraisdivers = $_GET['fraisdivers'];		        
$justifdivers = $_GET['justifdivers'];			        
$mtfraisdivers = $_GET['mtfraisdivers'];		        
$avances = $_GET['avances'];		        
$nbrepas = $_GET['nbrepas'];			        
$nbrenuite = $_GET['nbrenuite'];			        
$justifrepas = $_GET['justifrepas'];		        
$justifnuite = $_GET['justifnuite'];			        
$visaing = $_GET['visaing'];        
$visares = $_GET['visares'];						

// $sql0 = "INSERT INTO `carnets`(`IDPERSONNEL`, `IDOFFRES`, `SEMAINE`, `DATE_CONTRAT`, `TEMPS_EXTER`, `TEMPS_BUREAU`, `REFERENCE`, `TRANSPORT`, `KMTRANSPORT`, `NBRETRANSPORT`, `JUSTIFTRANS`, `PERDIEM`, `NBREPERDIEM`, `DERNIERJOUR`, `JUSTIFPERDIEM`, `FRAISDIVERS`, `JUSTIFDIVERS`, `MTFRAISDIVERS`, `AVANCES`, `NBREPAS`, `NBRENUITE`, `JUSTIFREPAS`, `JUSTIFNUITE`, `VISAING`, `VISARES`) VALUES (".$_GET['idpersonnel'].",".$_GET['idoffresca'].",".$_GET['semaine'].",".$_GET['date_contrat'].",".$_GET['temps_exter'].",".$_GET['temps_bureau'].",".$_GET['reference'].",".$_GET['transport'].",".$_GET['kmtransport'].",".$_GET['nbretransport'].",".$_GET['justiftrans'].",".$_GET['perdiem'].",".$_GET['nbreperdiem'].",".$_GET['dernierjour'].",".$_GET['justifperdiem'].",".$_GET['fraisdivers'].",".$_GET['justifdivers'].",".$_GET['mtfraisdivers'].",".$_GET['avances'].",".$_GET['nbrepas'].",".$_GET['nbrenuite'].",".$_GET['justifrepas'].",".$_GET['justifnuite'].",".$_GET['visaing'].",".$_GET['visares'].")";        		       

$sql = "INSERT INTO `carnets`(`IDPERSONNEL`, `IDOFFRES`, `SEMAINE`, `DATE_CONTRAT`, `TEMPS_EXTER`, `TEMPS_BUREAU`, `REFERENCE`, `TRANSPORT`, `KMTRANSPORT`, `NBRETRANSPORT`, `JUSTIFTRANS`, `PERDIEM`, `NBREPERDIEM`, `DERNIERJOUR`, `JUSTIFPERDIEM`, `FRAISDIVERS`, `JUSTIFDIVERS`, `MTFRAISDIVERS`, `AVANCES`, `NBREPAS`, `NBRENUITE`, `JUSTIFREPAS`, `JUSTIFNUITE`, `VISAING`, `VISARES`) VALUES (:idpersonnel, :idoffres, :semaine, :date_contrat, :temps_exter, :temps_bureau, :reference, :transport, :kmtransport, :nbretransport, :justiftrans, :perdiem, :nbreperdiem, :dernierjour, :justifperdiem, :fraisdivers, :justifdivers, :mtfraisdivers, :avances, :nbrepas, :nbrenuite, :justifrepas, :justifnuite, :visaing, :visares)";				

$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');       
$res = $db->prepare($sql);        
$exe = $res->execute(array(":idpersonnel" => $idpersonnel, ":idoffres" => $idoffres, ":semaine" => $semaine, ":date_contrat" => $date_contrat, ":temps_exter" => $temps_exter, ":temps_bureau" => $temps_bureau, ":reference" => $reference, ":transport" => $transport, ":kmtransport" => $kmtransport, ":nbretransport" => $nbretransport, ":justiftrans" => $justiftrans, ":perdiem" => $perdiem, ":nbreperdiem" => $nbreperdiem, ":dernierjour" => $dernierjour, ":justifperdiem" => $justifperdiem, ":fraisdivers" => $fraisdivers, ":justifdivers" => $justifdivers, ":mtfraisdivers" => $mtfraisdivers, ":avances" => $avances, ":nbrepas" => $nbrepas, ":nbrenuite" => $nbrenuite, ":justifrepas" => $justifrepas, ":justifnuite" => $justifnuite, ":visaing" => $visaing, ":visares" => $visares));                
if($exe)
{ header('location: carnet01.php');        }
else
{echo 'Echec insertion';
}  
// }