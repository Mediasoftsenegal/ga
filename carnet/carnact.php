<?php
require('../fpdf/fpdf.php');
session_start();
class PDF extends FPDF
{
// En-tête
function Header()
{
	setlocale(LC_TIME, 'fr_FR');
	date_default_timezone_set('Europe/Dakar');
	$date= utf8_encode(strftime('%A %d %B %Y'));	
	
    // Logo
    $this->Image('../assets/images/ga.png',10,2,60);
    // Police Arial gras 15
    $this->SetFont('Arial','B',13);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Cell(80,8,'EDITION CARNET D\'ACTIVITE',0,0,'C');
	 // Saut de ligne
    $this->Ln(15);
	// Date carnet 
	$this->Cell(80,10,'Date edition : '.$date,0,0,);
	 // Saut de ligne
    $this->Ln(10);	
    $this->Cell(80,10,utf8_decode('Prénom et Nom : '.$_SESSION['nom_afficher']),0,0);
	
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
	
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}'.'-'.(strftime('%Y')),0,0,'C');
}	
// Chargement des données
function LoadData($file)
{
    // Lecture des lignes du fichier
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Tableau simple
function BasicTable($header)
{
    $this->SetFont('Arial','B',10);
    // En-tête
    $this->Cell(21,6,'Date',1);
    $this->Cell(252,6,'Affaires',1);
    $this->Ln();
    // Données
    $firstday = $_GET['first'];
    $lastday = $_GET['last'];
    
    $datedeb=substr($firstday, 6, 2).'/'.substr($firstday, 4, 2).'/'.substr($firstday, 0,4);
	$datefin=substr($lastday, 6, 2).'/'.substr($lastday, 4, 2).'/'.substr($lastday, 0,4);
   
    $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
    $reponse = $db->query("SELECT * FROM carnets INNER JOIN perso ON carnets.IDPERSONNEL = perso.IDPERSONNEL
	INNER JOIN offres ON carnets.IDOFFRES = offres.IDOFFRES 
	WHERE carnets.IDPERSONNEL =".$_SESSION["IDPERSONNEL"]." 
	AND carnets.DATE_CONTRAT BETWEEN '$firstday' AND '$lastday' 
	ORDER BY carnets.DATE_CONTRAT ASC");
 
    while($donnees = $reponse->fetch()){
        $dater=explode('-',$donnees['DATE_CONTRAT']);
        $this->SetFont('Arial','',10);
        $this->Cell(21,6,$dater[2].'-'.$dater[1].'-'.$dater[0],1);
        $this->MultiCell(252,6,$donnees['AFFAIRE'],1);
        //$this->Ln();
    } $reponse->closeCursor();
    $this->Ln();
    $this->SetFont('Arial','B',10);
    foreach($header as $col)
        $this->Cell(24.8,6,$col,1);
    $this->Ln();
    $repons = $db->query("SELECT * FROM carnets INNER JOIN perso ON carnets.IDPERSONNEL = perso.IDPERSONNEL
	INNER JOIN offres ON carnets.IDOFFRES = offres.IDOFFRES 
	WHERE carnets.IDPERSONNEL =".$_SESSION["IDPERSONNEL"]." 
	AND carnets.DATE_CONTRAT BETWEEN '$firstday' AND '$lastday' 
	ORDER BY carnets.DATE_CONTRAT ASC");
    while($donnee = $repons->fetch()){
        $this->SetFont('Arial','',9);
        $this->Cell(24.8,6,$donnee['SEMAINE'],1);
        $this->Cell(24.8,6,$donnee['TEMPS_EXTER'],1);
        $this->Cell(24.8,6,$donnee['TEMPS_BUREAU'],1);
        $this->Cell(24.8,6,$donnee['TRANSPORT'],1);
        $this->Cell(24.8,6,$donnee['KMTRANSPORT'],1);
        $this->Cell(24.8,6,$donnee['PERDIEM'],1);
        $this->Cell(24.8,6,$donnee['NBREPERDIEM'],1);
        $this->Cell(24.8,6,$donnee['DERNIERJOUR'],1);
        $this->Cell(24.8,6,$donnee['NBREPAS'],1);
        $this->Cell(24.8,6,$donnee['NBRENUITE'],1);
        $this->Cell(24.8,6,$donnee['MTFRAISDIVERS'],1);
        $this->Ln();
    } $reponse->closeCursor();
    $this->Ln();
    $this->Ln();
}

function Recap() {
    include('conf.php');
    $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
    $firstday = $_GET['first'];
    $lastday = $_GET['last'];
    //forfaits
    $rep=$db->query("SELECT * FROM taux_missions order by id_taux desc LIMIT 1");
    while($don = $rep->fetch()){
        $txrepas=$don['taux_repasing'];$txnuite=$don['forfait_nuite'];
        $tauxaj=$don['forfait_afriquejour'];
        $tauxajd=$don['forfait_afriquejourder'];
        $tauxhaj=$don['forfait_horsafrique'];
        $tauxhadj=$don['forfait_horsafriquejourder'];
    } 
    // tx et forfaits
    $red=$db->query("SELECT IDPERSONNEL,Tauxkm,Forfaits_deplacement FROM `vehicules` WHERE IDPERSONNEL=".$_SESSION["IDPERSONNEL"]);
    while($dond = $red->fetch()){
        $txkm=$dond['Tauxkm']; 
        $fordepl=$dond['Forfaits_deplacement']; 
    }
    $this->SetFont('Arial','B',15);
    $this->Cell(0,5,utf8_decode('Récapitulatif'),0,1);
    $this->Ln();
    $this->SetFont('Arial','',9);
    $resto=nbtotalrep($_SESSION["IDPERSONNEL"],$firstday,$lastday);
    $montrepas=intval($resto)*$txrepas;
    $this->Cell(35,5,utf8_decode('Nombre de repas : '),0,0);
    $this->Cell(10,5,$resto,1,0,'C');
    $this->Cell(30,5,number_format($montrepas, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->SetFont('Arial','B',9);
    $this->Cell(95,5,utf8_decode('Perdième'),0,0);
    $this->Cell(10,5,'',0,0);
    $this->Cell(75,5,utf8_decode('Frais divers'),0,0);
    $this->Ln();
    $resnui=nbtotalnuite($_SESSION["IDPERSONNEL"],$firstday,$lastday);
    $montnuite=intval($resnui)*$txnuite;
    $this->SetFont('Arial','',9);
    $this->Cell(35,5,utf8_decode('Nombre de nuité : '),0,0);
    $this->Cell(10,5,$resnui,1,0,'C');
    $this->Cell(30,5,number_format($montnuite, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->Cell(95,5,'',0,0);
    $resfrais=nbtotalfrais($_SESSION["IDPERSONNEL"],$firstday,$lastday);
    $this->Cell(25,5,'',0,0);
    $this->Cell(25,5,'Frais divers : ',0,0);
    $this->Cell(25,5,number_format($resfrais, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Ln();
    $this->Cell(85,5,'',0,0);
    $this->Cell(55,5,utf8_decode('Perdième hors Afrique / jour : '),0,0);
    $Pha=hafj($_SESSION["IDPERSONNEL"],$firstday,$lastday);
    $totPhaj=intval($tauxhaj)*intval($Pha);
    $this->Cell(10,5,$Pha,1,0,'C');
    $this->Cell(30,5,number_format($totPhaj, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Ln();
    $this->Cell(35,5,utf8_decode('Voiture(Km) : '),0,0);
    $resvoit=nbtotalkm($_SESSION["IDPERSONNEL"],$firstday,$lastday);
    $totvoit=intval($resvoit)*$txkm;
    $this->Cell(10,5,$resvoit,1,0,'C');
    $this->Cell(30,5,number_format($totvoit, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->Cell(55,5,utf8_decode('Perdième hors Afrique dernier jour : '),0,0);
    $Phadj=dhafj($_SESSION["IDPERSONNEL"],$firstday,$lastday);
	$totPhadj=intval($tauxhadj)*intval($Phadj);
    $this->Cell(10,5,$Phadj,1,0,'C');
    $this->Cell(30,5,number_format($totPhadj, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,5,'Totaux : ',0,0);
    $this->SetFont('Arial','',9);
    $this->Cell(25,5,'Transport : ',0,0);
    $resdepl=nbtotaldpl($_SESSION["IDPERSONNEL"],$firstday,$lastday);
    $totfor=intval($resdepl)*$fordepl;
    $tottrans=$totfor+$totvoit;
    $this->Cell(25,5,number_format($tottrans, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Ln();
    $this->Cell(35,5,utf8_decode('Forfait dépl. : '),0,0);
    $this->Cell(10,5,$resdepl,1,0,'C');
    $this->Cell(30,5,number_format($totfor, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->Cell(55,5,utf8_decode('Perdième Afrique / jour : '),0,0);
    $Paj=afj($_SESSION["IDPERSONNEL"],$firstday,$lastday);
	$totPaj=intval($tauxaj)*intval($Paj);
    $this->Cell(10,5,$Paj,1,0,'C');
    $this->Cell(30,5,number_format($totPaj, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->Cell(20,5,'',0,0);
    $this->Cell(25,5,utf8_decode('Hébreg. : '),0,0);
    $monthebeg0=$montrepas;
    $monthebeg1=$montnuite;
	$totheg=$monthebeg0+$monthebeg1;
    $this->Cell(25,5,number_format($totheg, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Ln();
    $this->Cell(35,5,utf8_decode('Avion / Train : '),0,0);
    $this->Cell(10,5,'',1,0,'C');
    $this->Cell(30,5,'',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->Cell(55,5,utf8_decode('Perdième Afrique dernier jour : '),0,0);
    $Padj=derafj($_SESSION["IDPERSONNEL"],$firstday,$lastday);
	$totPadj=intval($tauxajd)*intval($Padj);
    $this->Cell(10,5,$Padj,1,0,'C');
    $this->Cell(30,5,number_format($totPadj, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->Cell(20,5,'',0,0);
    $this->Cell(25,5,utf8_decode('Divers. : '),0,0);
    $this->Cell(25,5,number_format($resfrais, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Ln();
    $this->SetFont('Arial','B',9);
    $this->Cell(45,5,utf8_decode('Total transport : '),0,0,'C');
    $this->Cell(30,5,number_format($tottrans, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->Cell(65,5,utf8_decode('Total Perdième : '),0,0,'C');
    $totgpaj=$totPhaj+$totPhadj+$totPaj+$totPadj;
    $this->Cell(30,5,number_format($totgpaj, 0, ',', ' ').' F CFA',1,0,'C');
    $this->Cell(10,5,'',0,0);
    $this->Cell(20,5,'',0,0);
    $this->SetFont('Arial','',9);
    $this->Cell(25,5,utf8_decode('Perdième : '),0,0);
    $tg=intval($tottrans+$totheg+$resfrais+$totgpaj);
    $this->Cell(25,5,number_format($totgpaj, 0, ',', ' ').' F CFA',1,0,'C');
    $this->SetFont('Arial','B',9);
    $this->Ln();
    $this->Cell(190,5,'',0,0);
    $this->Cell(45,5,utf8_decode('Total Général : '),0,0,'C');
    $this->Cell(25,5,number_format($tg, 0, ',', ' ').' F CFA',1,0,'C');
    /*
    $this->Cell(67,5,'',0,0);
    $this->Cell(75,5,'',0,0);
    
    $this->Cell(92,5,utf8_decode('Perdième Afrique: '.$Paj.' / '.number_format($totPaj, 0, ',', ' ').' F CFA'),0,0);
    $this->Ln();
    $this->Cell(67,5,'',0,0);
    $this->Cell(75,5,'',0,0);
    $this->Cell(92,5,utf8_decode('Perdième Afrique dernier jour : '.$Padj.' / '.number_format($totPadj, 0, ',', ' ').' F CFA'),0,0);
    $this->Ln();
    $this->SetFont('Arial','B',11);
    $this->Cell(67,5,utf8_decode('Total Hébergement : '.number_format($totheg, 0, ',', ' ').' F CFA'),0,0);
    
    $this->Cell(75,5,utf8_decode('Total Transport : '.),0,0);
    
    $this->Cell(92,5,utf8_decode('Total Perdième : '.number_format($totgpaj, 0, ',', ' ').' F CFA'),0,0);
    $this->Cell(92,5,utf8_decode('Total Frais : '.number_format($resfrais, 0, ',', ' ').' F CFA'),0,0);
    $this->Ln();
    $this->Ln();
    $this->Ln();
    $this->SetFont('Arial','B',15);
    $this->Cell(0,7,utf8_decode('Totaux : '),0,1);
    $this->Ln();
    $this->SetFont('Arial','',12);
    $this->Cell(0,5,utf8_decode('Hébergement : '.number_format($totheg, 0, ',', ' ').' F CFA'),0,1);
    $this->Cell(0,5,utf8_decode('Transport : '.number_format($tottrans, 0, ',', ' ').' F CFA'),0,1);
    $this->Cell(0,5,utf8_decode('Perdième : '.number_format($totgpaj, 0, ',', ' ').' F CFA'),0,1);
    $this->Cell(0,5,utf8_decode('Frais : '.,0,1);
    $this->Ln();
    $this->SetFont('Arial','B',15);
    $this->Cell(0,7,utf8_decode('Total Général : '.),0,1);*/
}

}

$pdf = new PDF();
// Titres des colonnes
$header = array('Code', 'Temps ext.', 'Temps bur.', 'Moyen depl.', 'KM / Forf.', 'Perdiems'
,'Nbre jrs','Dernier jour','Nbre repas','Nbre nuites','Frais divers');
// Chargement des données
$data = $pdf->LoadData('pays.txt');
$pdf->SetFont('Arial','',10);
$pdf->AddPage(L,A4,0);
$pdf->BasicTable($header);
$pdf->Recap();

$pdf->Output();
?>
