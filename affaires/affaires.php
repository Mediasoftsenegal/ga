<? require '../header.php';
 include('conf.php');	 
 ?>
<? require_once("db_connect.php"); ?>
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
                <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-account-box-outline"></i>
                </span> Gestion administrative : Module des Affaires </h3>     
        </div>
		<div class="row">
			<div class="col-md-5 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="card card-inverse-success" id="context-menu-multi">
                     	 	<h4 class="card-title">Détails Affaire</h4>					  
					  		</div>
						</div>	
						<div class="col-md-6">
                    		<a href="affoff.php"><button type="submit" id="sort" name="bt_affaire" class="btn btn-warning btn-sm float-right">Nouvelle affaire</button></a>
						</div>
					</div>	
                    <!--div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"-->
                         <form name="diapfo" class="forms-sample" action="douguele.php" method="POST">
							<div class="row">
								<div class="col-md-6"> 
									<div class="form-group">
										<label>N° Commande</label>
										<?php if (isset($_GET['id'])){?>
										<input type="hidden" class="form-control" id="inputnom" value="<?php echo $donne['IDAFFAIRES'];?>" name="IDAFFAIRES">
										<select name="NUMCOMMANDE" class="form-control">
										<option value="<?= $donne['IDCOMMANDES']?>"  selected="selected"><?= $donne['NUMCOMMANDE'];?></option>
										</select>
										<?php } else {?>								
										<select name="NUMCOMMANDE" class="form-control">
										<?php $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
										$repons = $db->query("SELECT commandes.IDCOMMANDES,commandes.NUMCOMMANDE FROM commandes  WHERE NUMCOMMANDE <>'' ORDER BY IDCOMMANDES ASC");
										
										while($donnee = $repons->fetch()){?>
										<option value="<?= $donnee['IDCOMMANDES']?>"><?= $donnee['NUMCOMMANDE']?></option>
										
										<?php }?> 
										</select>
										<?php }?> 
									</div>
									
									<div class="form-group">
										<label>Lieu</label>
										<? if (isset($_GET['id'])){?>
										<input type="text" style="text-transform: uppercase;" class="form-control"  id="LIEU" value="<?php echo $donne['LIEU'];?>"  name="LIEU" disabled >
										<? } else { ?> 
										<input type="text" style="text-transform: uppercase;" class="form-control"  placeholder="Lieu " name="LIEU" disabled>
										<? }?> 
										
									</div>
								
								</div> 
								<div class="col-md-6">
									<div class="form-group">
										<label>Année</label>
										<? if (isset($_GET['id'])){?>
										<input type="text" style="text-transform: uppercase;" class="form-control"  id="NUMOFFRE" value="<?php echo $donne['ANAFF'];?>"  name="NUMOFFRE" disabled >
										<? } else { ?> 
										<input type="text" style="text-transform: uppercase;" class="form-control"  placeholder="Année " name="ANAFF" disabled>
										<? }?> 
									</div>
									<div class="form-group">
									<label>Affaire</label>
									<? if (isset($_GET['id'])){?>
									<textarea class="form-control" id="floatingTextarea2" style="height: 100px" id="MISSIONS" name="AFFAIRE" disabled >
									<?= utf8_encode($donne['AFFAIRE'])?> </textarea>
									<? } else { ?> 
									<textarea class="form-control" placeholder="Opérations" id="floatingTextarea2" style="height: 100px" name="AFFAIRE" disabled></textarea>
									<? }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label>Client</label>
									<? if (isset($_GET['id'])){?>
									<input type="text" class="form-control" id="CLIENT" value="<?= $donne['CLIENT']?>" name="CLIENT" disabled>
									<? } else { ?> 
									<input type="text" class="form-control" id="CLIENT" placeholder="Client" name="CLIENT" disabled >
									<? }?> 
									</div>
								</div>
								<div class="col-md-6">  
									<div class="form-group">
									<label>Etat d'avancement</label>
									<? if (isset($_GET['id'])){?>
									<input type="text" class="form-control" id="SOCIETE" value="<?= $donne['ETAT']?>" name="ETAT" disabled>
									<? } else { ?> 
									<input type="text" class="form-control" id="SOCIETE" placeholder="Etat d'avancement" name="ETAT" disabled>
									<? }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
									<label>Montant honoraire</label>
									<? if (isset($_GET['id'])){?>
									<input type="text" class="form-control" id="MONTANTHONORAIRE" value="<?= $donne['MONTANTHONORAIRE']?>" name="MONTANTHONORAIRE" disabled>
									<? } else { ?> 
									<input type="text" class="form-control" id="MONTANTHONORAIRE" placeholder="Montant honoraire" name="MONTANTHONORAIRE" disabled>
									<? }?> 
									</div>
								</div>  
								<div class="col-md-6">  
									<div class="form-group">
									<label>Date début</label>
									<? if (isset($_GET['id'])){?>
									<input type="date" class="form-control" id="DATEDEMARRAGE" value="<?= $donne['DATEDEMARRAGE']?>" name="DATEDEMARRAGE" disabled>
									<? } else { ?> 
									<input type="date" class="form-control" id="DATEDEMARRAGE" placeholder="Date début" name="DATEDEMARRAGE" disabled>
									<? }?> 
									</div>
								</div> 
							</div> 
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
									<label>Date fin prévisionnelle</label>
									<? if (isset($_GET['id'])){?>
									<input type="date" class="form-control" id="inputAddresse" value="<?= $donne['NUMAFFAIRE']?>" name="NUMAFFAIRE">
									<? } else { ?> 
									<input type="date" class="form-control" id="inputAddresse" placeholder="Numéro affaire" name="NUMAFFAIRE">
									<? }?> 
									</div>
								</div>
								<div class="col-md-6">   
								<div class="form-group">
									<label>Date réelle</label>
									<? if (isset($_GET['id'])){?>
									<input type="date" style="text-transform: uppercase;" class="form-control"   value="<?php echo $donne['DATEFIN'];?>"  name="DUREE">
									<? } else { ?> 
									<input type="date" style="text-transform: uppercase;" class="form-control"  placeholder="Date réelle" name="DATEFIN">
									<? }?> 
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Missions Proposées</label>
										<? if (isset($_GET['id'])){?>										
										<input type="text" class="form-control" id="inputnom" value="<?php echo utf8_encode($donne['MISSIONS']);?>" name="MISSIONS">
										<? } else { ?> 
										<input type="text" class="form-control" id="inputnom" placeholder="Missions Proposées" name="MISSIONS">
										<? }?> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<label>Durée</label>
									<? if (isset($_GET['id'])){?>
									<input type="text" class="form-control" id="inputAddresse" value="<?= $donne['DUREE']?>" name="DUREE">
									<? } else { ?> 
									<input type="text" class="form-control" id="inputAddresse" placeholder="Durée" name="DUREE">
									<? }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Maître d'oeuvre</label>
										<? if (isset($_GET['id'])){?>										
										<input type="text" class="form-control" id="inputnom" value="<?php echo $donne['MAITREOEUVRE'];?>" name="MAITREOEUVRE">
										<? } else { ?> 
										<input type="text" class="form-control" id="inputnom" placeholder="Maître d'oeuvres" name="MAITREOEUVRE">
										<? }?> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<label>Date reprise</label>
									<? if (isset($_GET['id'])){?>
									<input type="date" class="form-control" id="inputAddresse" value="<?= $donne['DATEREPRISE']?>" name="DATEREPRISE">
									<? } else { ?> 
									<input type="date" class="form-control" id="inputAddresse" placeholder="Date reprise" name="DATEREPRISE">
									<? }?> 
									</div>
								</div>
							</div>
							<div class="row">								
								<div class="col-md-6">
									<div class="form-group">
									<label>Intervenants</label>
									<? if (isset($_GET['id'])){?>
									<textarea class="form-control" id="floatingTextarea2" style="height: 50px" name="AUTRES_INFOS"><?= $donne['AUTRES_INFOS']?></textarea>
									<? } else { ?> 
									<textarea class="form-control" placeholder="Intervenants" id="floatingTextarea2" style="height: 100px" name="AUTRES_INFOS"></textarea>
									<? }?> 
									</div>
								</div>	
								<div class="col-md-6">	
									<div class="form-group">
										<label>Observations</label>
										<? if (isset($_GET['id'])){?>
										<input type="text" class="form-control" id="inputnom" value="<?php  echo utf8_encode($donne['OBSERVATIONS']);?>" name="OBSERVATIONS">
										<? } else { ?> 
										<input type="text" class="form-control" id="inputnom" placeholder="Observations" name="OBSERVATIONS">
										<? }?> 
									</div>
									
									
								</div>
							</div>
						
                      <br/> 
                      <button  id="sort" name="modif_com" class="btn btn-info btn-sm">Modifier</button>           
                      <button  onclick="confirmer()" id="sort" name="supp_com" class="btn btn-danger btn-sm">Supprimer</button>
                       </form>
                       
                    </div>
                   
                </div>
               </div>
        
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Listes des Affaires </h4>
				<div class="card card-inverse-success" id="context-menu-multi">
                      <h4 class="card-title">Cliquez sur l'icône pour choisir une affaire</h4>
					  </div>
                <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                              <th></th>
                              <th>Année</th> 
                              <th>Service</th>    
                              <th>N° Commande</th>
                              <th>Opérations</th>
                              <th>Lieu</th>
                              <th>Client</th>
                              <th>Etat Avancement</th>         
                              <th>Date début</th>   
                              <th>Date fin</th>          
                              <th>date fin réelle</th>   
							  <th>date reprise</th> 
							  <th>Missions</th> 
							  <th>Observations</th> 
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th></th>
                              <th>Année</th> 
                              <th>Service</th>    
                              <th>N° Commande</th>
                              <th>Opérations</th>
                              <th>Lieu</th>
                              <th>Client</th>
                              <th>Etat Avancement</th>         
                              <th>Date début</th>   
                              <th>Date fin</th>          
                              <th>date fin réelle</th>   
							  <th>date reprise</th> 
							  <th>Missions</th> 
							  <th>Observations</th> 
                              </tr>
                            </tfoot>
                            <tbody>
                              <? 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                             // $reponse = $db->query("SELECT affaires.IDAFFAIRES,affaires.IDCOMMANDES,affaires.DATESIGNATURE,
							//	affaires.IDOFFRES,affaires.LIEU,affaires.ETAT,affaires.ANAFF,commandes.NUMCOMMANDE,commandes.DUREE,commandes.DATEDEMARRAGE,offres.MONTANT,
							//	affaires.OBSERVATIONS,affaires.`CLIENT`,offres.IDCONTACTS,offres.MONTANTHONORAIRE,affaires.NBREVISITESPREV,perso.PRENOMNOM,
							//	affaires.NBREVISITESREAL,affaires.DATEFIN,affaires.DATEREPRISE,offres.AFFAIRE,
							//	offres.MISSIONS, offres.SERVICE,offres.MAITREOEUVRE 
							//	FROM affaires,offres,commandes,perso
							//	WHERE commandes.IDOFFRES=offres.IDOFFRES
							//	AND affaires.IDCOMMANDES=commandes.IDCOMMANDES 
						//		AND perso.IDPERSONNEL=offres.IDCONTACTS 
                         //     ORDER BY ANAFF DESC");

								$reponse = $db->query("SELECT affaires.IDAFFAIRES,affaires.IDCOMMANDES,commandes.NUMCOMMANDE,commandes.DATEDEMARRAGE,offres.AFFAIRE,clients.SOCIETE,affaires.DATESIGNATURE,
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
								
								<td> <a href="affaires.php?id=<?php echo $donnees['IDAFFAIRES'];?>"><i class="mdi mdi-arrange-send-backward"></i></a></td> 
                                <td><?= $donnees['ANAFF']?> </td>
								<td><?= $donnees['SERVICE']?></td>
								<td><?=$donnees['NUMCOMMANDE']?></td> </p>
								<? $snomaff=sautpoint(sautligne(utf8_encode($donnees['AFFAIRE'])))?>
                                <td width=1%><?= $snomaff ?></td>                                
                                <td><?= $donnees['LIEU'];?></td> 
								<td><?= $donnees['CLIENT'];?></td>   
                                <td><?= $donnees['ETAT'] ?></td>
                                <td><?= $date[2].'/'.$date[1].'/'.$date[0]?></td> 
								<td><?= $dates[2].'/'.$dates[1].'/'.$dates[0]?></td> 
                                <td><?= $dates[2].'/'.$dates[1].'/'.$dates[0]?></td>  
								<td><?= $dates[2].'/'.$dates[1].'/'.$dates[0]?></td>  
								
                                <td><?= $donnees['MISSIONS']?></td>       
                                <td><? echo utf8_encode($donnees['OBSERVATIONS']);?></td>  
                               
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