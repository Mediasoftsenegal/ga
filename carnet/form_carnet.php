<? 
session_start();	
require '../headers.php';
include('conf.php');	
 ?>
<?
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
if (isset($_GET['id'])){
   
    $id_affaire=$_GET['id'];

    $repon = $db->query("SELECT affaires.IDAFFAIRES,affaires.IDCOMMANDES,affaires.DATESIGNATURE,
	affaires.IDOFFRES,affaires.LIEU,affaires.ETAT,affaires.ANAFF,commandes.NUMCOMMANDE,commandes.DUREE,commandes.DATEDEMARRAGE,offres.MONTANT,
	affaires.OBSERVATIONS,affaires.`CLIENT`,offres.IDCONTACTS,offres.MONTANTHONORAIRE,affaires.NBREVISITESPREV,
	affaires.NBREVISITESREAL,affaires.DATEFIN,affaires.DATEREPRISE,offres.AFFAIRE,
	offres.MISSIONS, offres.AUTRES_INFOS,offres.MAITREOEUVRE 
	FROM affaires,offres,commandes
	WHERE commandes.IDOFFRES=offres.IDOFFRES
	AND affaires.IDCOMMANDES=commandes.IDCOMMANDES 
	AND affaires.IDAFFAIRES =$id_affaire");
	$donne = $repon->fetch();
}
?>
<!--div class="main-panel"-->
    <div class="content-wrapper">
        <div class="row" id="proBanner">
            <div class="col-12"></div>
		</div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white mr-2">
                <i class="mdi mdi-account-box-outline"></i>
                </span> Gestion administrative : Module Carnet d'activité </h3>     
        </div><? echo 'Utilisateur :  '.$_SESSION["nom_afficher"]?>
		<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
				
			
                <div class="card-body">
				
            <div class="alert alert-warning" role="alert"><h2 class="card-title">Etape 1 : Choisir une Affaire  => cliquer sur l'icône dans la dernière colonne pour choisir une affaire  </h2> </div>   
                    <div class="progress">
                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div><br>	
				
                <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                              <th>N° Commande</th>
                              <th>N° Affaire</th>
                              <th>Opérations</th>
                              <th>Client</th>
							  <th></th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th>N° Commande</th>
                              <th>N° Affaire</th>
                              <th>Opérations</th>
                              <th>Client</th>
							  <th></th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <? 
                              $i = 0;
                //$reponse = $db->query("SELECT affaires.IDAFFAIRES,affaires.IDCOMMANDES,affaires.DATESIGNATURE,								affaires.IDOFFRES,affaires.LIEU,affaires.ETAT,affaires.ANAFF,commandes.NUMCOMMANDE,commandes.DUREE,commandes.DATEDEMARRAGE,offres.MONTANT,
								//affaires.OBSERVATIONS,affaires.`CLIENT`,offres.IDCONTACTS,offres.MONTANTHONORAIRE,affaires.NBREVISITESPREV,perso.PRENOMNOM,
								//affaires.NBREVISITESREAL,affaires.DATEFIN,affaires.DATEREPRISE,offres.AFFAIRE,
								//offres.MISSIONS, offres.SERVICE,offres.MAITREOEUVRE 
								//FROM affaires,offres,commandes,perso
							  //	WHERE commandes.IDOFFRES=offres.IDOFFRES
							  //	AND affaires.IDCOMMANDES=commandes.IDCOMMANDES 
							  //	AND perso.IDPERSONNEL=offres.IDCONTACTS 
                 //             ORDER BY ANAFF DESC");
                  $reponse = $db->query("SELECT affaires.IDAFFAIRES,affaires.IDCOMMANDES,commandes.NUMAFFAIRE,commandes.NUMCOMMANDE,commandes.DATEDEMARRAGE,offres.AFFAIRE,clients.SOCIETE,affaires.DATESIGNATURE,
                  affaires.IDOFFRES,affaires.LIEU,offres.MISSIONS, offres.SERVICE,affaires.ETAT,affaires.ANAFF,affaires.OBSERVATIONS,affaires.`CLIENT`,
                  affaires.NBREVISITESPREV,affaires.NBREVISITESREAL,affaires.DATEFIN,affaires.DATEREPRISE,affaires.DATEFIN,affaires.DATEREPRISE
                  FROM affaires,commandes,offres,clients
                  WHERE affaires.IDCOMMANDES=commandes.IDCOMMANDES
                  AND commandes.IDOFFRES=offres.IDOFFRES
                  AND affaires.IDOFFRES=offres.IDOFFRES
                  AND offres.IDCONTACTS=clients.IDCONTACTS
                  ORDER BY IDAFFAIRES DESC");

                              while($donnees = $reponse->fetch()){
                                ?>
                               <tr>
                                <?$date=explode("-",$donnees['DATESIGNATURE'])?>
                                <?$dates=explode("-",$donnees['DATEFIN'])?>
                                <?$dater=explode("-",$donnees['DATEREPRISE'])?>
                                <?$daters=explode("-",$donnees['DATEDEMARRAGE'])?>	
                            
							                	<td><?=$donnees['NUMCOMMANDE']?></td> </p>
                                <td><?= $donnees['NUMAFFAIRE'];?></td> 
							                	<? $snomaff=sautpoint(sautligne(utf8_encode($donnees['AFFAIRE'])))?>
                                <td width=1%><?= ($snomaff) ?></td>     
                                <td><?= $donnees['CLIENT'];?></td>
                                <td> <a href="carnets.php?id=<?php echo $donnees['IDAFFAIRES'];?>"><i class="mdi mdi-arrange-send-backward"></i> </a></td> 
                              </tr>
                              <? } $reponse->closeCursor(); ?>
                            </tbody>
                          </table>
                        </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 </div>
 <?php require '../footer.php'; ?>