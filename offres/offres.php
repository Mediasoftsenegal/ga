<? 
session_start();	 
require '../header.php'; 
include 'conf.php';	 

function utf8_for_xml($string)
{
  return preg_replace('/[^\x{0009}\x{000a}\x{000d}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}]+/u',
					  ' ', $string);
}

?>
<?php 
if (isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
    $id_commandes=$_GET['id'];

    $repon = $db->query("SELECT IDOFFRES,AFFAIRE,MONTANT,SERVICE, MAITREOEUVRE,DATEACQUISITION,AUTRES_INFOS,NUMOFFRE,MONTANTHONORAIRE,ANNEE,MISSIONS,offres.IDCONTACTS,SOCIETE,clients.IDCONTACTS
	From offres,clients 
	WHERE  offres.IDCONTACTS=clients.IDCONTACTS
	AND offres.IDOFFRES = $id_commandes");
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
                <span class="page-title-icon bg-gradient-danger text-white mr-2">
                <i class="mdi mdi-account-box-outline"></i>
                </span> Gestion administrative : Module des offres </h3>     
        </div>
		<div class="row">
			<div class="col-md-5 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="card card-inverse-danger" id="context-menu-multi">
								<h4 class="card-title">Détails offres</h4>
								</div>
							</div>
							<div class="col-md-6">
                    			<a href="of.php"><button type="submit" id="sort" name="bt_offre" class="btn btn-warning btn-sm float-right">Nouvelle offre</button></a>
							</div>
						</div>
                    <!--div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"-->
                         <form name="diapfo" accept-charset="utf-8" class="forms-sample" action="douguel.php"  onsubmit="return W3docs()" method="POST">
							<div class="row">
								<div class="col-md-6"> 
									<div class="form-group">
										<label>Date offre</label>
										<?php if (isset($_GET['id'])){?>
										<input type="hidden" class="form-control" id="inputnom" value="<?php echo $donne['IDOFFRES'];?>" name="IDOFFRES">
										<input type="date" class="form-control" id="inputnom" value="<?php echo $donne['DATEACQUISITION'];?>" name="DATEACQUISITION">
										<?php } else { ?> 
										<input type="date" class="form-control" id="inputnom" placeholder="Date acquisition" name="DATEACQUISITION">
										<?php }?> 
									</div>
								</div> 	
								<div class="col-md-12"> 
									<div class="form-group">
										<label>Affaire</label>
										<?php if (isset($_GET['id'])){?>
										<textarea class="form-control"  id="floatingTextarea2" rows="6" cols="50"name="AFFAIRE"><?=utf8_encode($donne['AFFAIRE'])?></textarea>
										<?php } else { ?> 
										<textarea class="form-control" onkeyup="this.value = this.value.toUpperCase();" placeholder="Affaires" id="floatingTextarea2" rows="6" cols="50" name="AFFAIRE"></textarea>
										<?php }?> 
									</div>
									
								</div> 
								<div class="col-md-6">
									<div class="form-group">											
										<label>Numéro offre</label>
										<?php if (isset($_GET['id'])){?>
										<input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip"  value="<?php echo $donne['NUMOFFRE'];?>"  name="NUMOFFRE">
										<?php } else { ?> 
										<input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip" placeholder="Numéro offre" name="NUMOFFRE">
										<?php }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label> Choisir un Client </label>
									<select name="IDCONTACTS" class="form-control">
										<?php if (isset($_GET['id'])){?>
										<option value="<?= $donne['IDCONTACTS']?>" selected="selected"><?= $donne['SOCIETE']?></option>
										<?php $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
										$repons = $db->query("SELECT IDCONTACTS,SOCIETE FROM clients ORDER BY SOCIETE ASC");
										while($donnee = $repons->fetch()){?> 
										<option value="<?= $donnee['IDCONTACTS']?>"><?= $donnee['SOCIETE']?></option>
										<?php } $repons->closeCursor();?>
										<?php } else { ?> 
										<?php $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
										$repons = $db->query("SELECT IDCONTACTS,SOCIETE FROM clients ORDER BY SOCIETE ASC");
										while($donnee = $repons->fetch()){?>
										<option value="<?= $donnee['IDCONTACTS']?>"><?= $donnee['SOCIETE']?></option>
										<?php } $repons->closeCursor();?>
										<?php }?> 
									</select>
									</div>
								</div>
								<div class="col-md-6">  
									<div class="form-group">
									<label>Montant offre</label>
									<?php if (isset($_GET['id'])){?>
									<input type="number" class="form-control" id="inputsociete" value="<?= $donne['MONTANT']?>" name="MONTANT">
									<?php } else { ?> 
									<input type="number" class="form-control" id="inputsociete" placeholder="Montant" name="MONTANT">
									<?php }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
									<label>Maître d'oeuvre</label>
									<?php if (isset($_GET['id'])){?>
									<input type="text" class="form-control" id="inputsociete" value="<?= $donne['MAITREOEUVRE']?>" name="MAITREOEUVRE">
									<?php } else { ?> 
									<input type="text" class="form-control" id="inputsociete" placeholder="Maître d'oeuvre" name="MAITREOEUVRE">
									<?php }?> 
									</div>
								</div>  
								<div class="col-md-6">  
									<div class="form-group">
									<label>Montant Honoraire</label>
									<?php if (isset($_GET['id'])){?>
									<input type="number" class="form-control" id="inputCity" value="<?= $donne['MONTANTHONORAIRE']?>" name="MONTANTHONORAIRE">
									<?php } else { ?> 
									<input type="number" class="form-control" id="inputCity" placeholder="Montant honoraire" name="MONTANTHONORAIRE">
									<?php }?> 
									</div>
								</div> 
							</div> 
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
									<label>Autres infos</label>
									<?php if (isset($_GET['id'])){?>
									<input type="text" class="form-control" id="inputAddresse" value="<?= $donne['AUTRES_INFOS']?>" name="AUTRES_INFOS">
									<?php } else { ?> 
									<input type="text" class="form-control" id="inputAddresse" placeholder="Autres infos" name="AUTRES_INFOS">
									<?php }?> 
									</div>
								</div>
								<div class="col-md-6">   
									<div class="form-group">
									<label>Missions Proposées</label>
									<?php if (isset($_GET['id'])){?>
									<textarea class="form-control" id="floatingTextarea2" style="text-transform: uppercase;" style="height: 100px" name="MISSIONS"><?= utf8_encode($donne['MISSIONS'])?></textarea>
									<?php } else { ?> 
									<textarea class="form-control" placeholder="Missions Proposées" id="floatingTextarea2" style="height: 100px" name="MISSIONS"></textarea>
									<?php }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group"> 
									<label>Affaire suivi par</label> 
									<select name="services" class="form-control">
									<?php if (isset($_GET['id'])){?>
									<option value="<?= $donne['SERVICE']?>" selected="selected"><?= $donne['SERVICE']?></option>
									<?$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 									
									$repons = $db->query("SELECT * FROM services");
									while($donnee = $repons->fetch()){?>
									<option value="<?= $donnee['nomservice']?>"><?= $donnee['nomservice']?></option>									
									<?php } $repons->closeCursor(); ?>
									<? } else {	
									$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 									
									$repons = $db->query("SELECT * FROM services");
									while($donnee = $repons->fetch()){?>
									<option value="<?= $donnee['nomservice']?>"><?= $donnee['nomservice']?></option>
									<? } $repons->closeCursor(); }?>
									</select>
									</div> <!-- /.form-group -->
								</div>
								<div class="form-group">
										<label>Année</label>
										<?php if (isset($_GET['id'])){?>
										<input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip"  value="<?php echo $donne['ANNEE'];?>"  name="ANNEE">
										<?php } else { ?> 
										<input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip" placeholder="Année" name="ANNEE">
										<?php }?> 
									</div>
							</div>
                      <br/> 
                      <button  id="sort" name="modifoff" class="btn btn-info btn-sm">Modifier</button>
                      <button  onclick="confirmer()" id="sort" name="dindi_offre" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                       
                    </div>
                   
                </div>
               </div>
        
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Listes des offres </h4>
               
                <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                              <th></th>
                              <th>Année</th> 
                              <th>N°offre</th>    
                              <th>Affaire</th>
                              <th>Montant</th>
                              <th>contact</th>
                              <th>Date acquisition</th>
                              <th>Maître d'oeuvre</th>         
                              <th>Missions Proposées</th>   
                              <th>Montant honoraire</th>          
                              <th>Affaire suivi par</th>   
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th>  </th>    
                              <th>Année</th> 
                              <th>N°offre</th>    
                              <th>Affaire</th>
                              <th>Montant</th>
                              <th>contact</th>
                              <th>Date acquisition</th>
                              <th>Maître d'oeuvre</th>         
                              <th>Missions Proposées</th>   
                              <th>Montant honoraire</th>          
                              <th>Affaire suivi par</th>   
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT * FROM offres
                              INNER JOIN clients ON  offres.IDCONTACTS = clients.IDCONTACTS 
                              ORDER BY ANNEE DESC");
                              while($donnees = $reponse->fetch()){
                                ?>
                               <tr>
                                <?$date=explode("-",$donnees['DATEACQUISITION'])?>
								 <td> <a href="offres.php?id=<?php echo $donnees['IDOFFRES'];?>">Choisir </a></td> 
                                <td><?= $donnees['ANNEE']?> </td>
                                <td width=1%><?= $donnees['NUMOFFRE']?></td>
                                <td><?=sautpoint(sautligne(utf8_encode($donnees['AFFAIRE'])))?></td> </p>
                                <td><?= number_format($donnees['MONTANT'], 0, ',', ' ');?>F CFA</td>  
                                <td><?= $donnees['CIVILTE'].$donnees['PRENOM_NOM'] ?></td>                                    
                                <td><?= $date[2].'/'.$date[1].'/'.$date[0]?></td> 
                                <td><?= $donnees['MAITREOEUVRE']?></td>    
                                <td><?= utf8_encode($donnees['MISSIONS'])?></td>       
                                <td><?= number_format($donnees['MONTANTHONORAIRE'], 0, ',', ' ');?>F CFA</td>  
                                <td><?= $donnees['SERVICE']?></td> 
                              </tr>
                              <?php } $reponse->closeCursor(); ?>
                            </tbody>
                          </table>
                        </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>  
    
 </div>
 <?php require '../footer.php'; ?>