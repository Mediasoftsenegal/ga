<? require '../header.php'; ?>
<? require_once("db_connect.php");include 'conf.php';?>
<?
if (isset($_GET['id'])){
   
    $id_commandes=$_GET['id'];
    $repon = $db->query("SELECT commandes.IDCOMMANDES,commandes.NUMCOMMANDE,commandes.IDOFFRES,commandes.DATECOMMANDE,commandes.MONTANTHONOTAIRE,commandes.DATEDEMARRAGE,commandes.DUREE,commandes.NUMAFFAIRE,commandes.DATEDEMARRAGE,commandes.ADRESSEFACTURATION,commandes.EXONERETVA,commandes.PRECOMPTETVA,commandes.TYPEINTERVENTION,offres.AFFAIRE,offres.IDCONTACTS,clients.NUMCLIENT,clients.SOCIETE,offres.AFFAIRE,offres.MISSIONS,offres.NUMOFFRE
	FROM offres,clients,commandes
	WHERE offres.IDOFFRES=commandes.IDOFFRES
	AND clients.IDCONTACTS=offres.IDCONTACTS
	AND commandes.IDCOMMANDES= $id_commandes");
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
                <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-account-box-outline"></i>
                </span> Gestion administrative : Module des commandes </h3>     
        </div>
		<div class="row">
			<div class="col-md-5 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="row">	
							<div class="col-md-6">	
								<div class="card card-inverse-info" id="context-menu-multi">	
                     		 		<h4 class="card-title">Détails commandes</h4>
					  			</div> 
							</div> 
							<div class="col-md-6">	
						 		<a class="float-right" href="comaff.php"><button id="sort" name="modif_come" class="btn btn-warning btn-sm">Nouvelle Commande</button></a>
                    			<!--div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"-->
							</div>
						</div>
						 
                         <form name="diapfo" class="forms-sample" action="douguele.php" method="POST">
							<div class="row">
								<div class="col-md-6"> 
									<div class="form-group">
										<label>N° Commande</label>
										<? if (isset($_GET['id'])){?>
										<input type="hidden" class="form-control" id="inputnom" value="<?php echo $donne['IDCOMMANDES'];?>" name="IDCOMMANDES">
										<input type="text" class="form-control" id="inputnom" value="<?php echo $donne['NUMCOMMANDE'];?>" name="NUMCOMMANDE">
										<? } else { ?> 
										<input type="text" class="form-control" id="inputnom" placeholder="N° Commande" name="NUMCOMMANDE">
										<? }?> 
									</div>
								</div> 	
								<div class="col-md-12">
									<form name="insert" action="" method="POST">
									<div class="form-group">
										<label>Affaire</label>
										<select onchange="getdetail(this.value);"  name="IDOFFRES"  id="IDOFFRES" class="form-control">
											<? if (isset($_GET['id'])){?>
												<option value="<?= $donne['IDOFFRES']?>" selected="selected"><?= utf8_encode($donne['AFFAIRE'])?></option>
												<? } else { ?> 
												<? //$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
												$repons = $db->query("SELECT distinct IDOFFRES,AFFAIRE FROM offres ORDER BY IDOFFRES DESC ");
												while($donnee = $repons->fetch()){?>
												<option value="<?= $donnee['IDOFFRES']?>"><?= utf8_encode($donnee['AFFAIRE'])?></option>
												<? } $repons->closeCursor();?>
											<? }?> 
										</select>
									</div>
									</form>
								</div> 
								<div class="col-md-6">
									<div class="form-group">
										<label>Numéro Offre</label>
										<? if (isset($_GET['id'])){?>
										<input type="text" style="text-transform: uppercase;" class="form-control"  id="NUMOFFRE" value="<?php echo $donne['NUMOFFRE'];?>"  name="NUMOFFRE" disabled >
										<? } else { ?> 
										<input type="text" style="text-transform: uppercase;" class="form-control"  placeholder="Numéro offre" name="NUMOFFRE" disabled>
										<? }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label>Missions Proposées</label>
									<? if (isset($_GET['id'])){?>
									<textarea class="form-control" id="floatingTextarea2" style="height: 100px" id="MISSIONS" name="MISSIONS" disabled ><?= $donne['MISSIONS']?> </textarea>
									<? } else { ?> 
									<textarea class="form-control" placeholder="Missions Proposées" id="floatingTextarea2" style="height: 100px" name="MISSIONS" disabled></textarea>
									<? }?> 
									</div>
								</div>
								<div class="col-md-6">  
									<div class="form-group">
									<label>Code client</label>
									<? if (isset($_GET['id'])){?>
									<input type="number" class="form-control" id="NUMCLIENT" value="<?= $donne['NUMCLIENT']?>" name="NUMCLIENT" disabled>
									<? } else { ?> 
									<input type="number" class="form-control" id="NUMCLIENT" placeholder="Numéro client" name="NUMCLIENT" disabled >
									<? }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
									<label>Nom Client</label>
									<? if (isset($_GET['id'])){?>
									<input type="text" class="form-control" id="SOCIETE" value="<?= $donne['SOCIETE']?>" name="SOCIETE" disabled>
									<? } else { ?> 
									<input type="text" class="form-control" id="SOCIETE" placeholder="Client" name="SOCIETE" disabled>
									<? }?> 
									</div>
								</div>  
								<div class="col-md-6">  
									<div class="form-group">
									<label>Montant Honoraire</label>
									<? if (isset($_GET['id'])){?>
									<input type="number" class="form-control" id="MONTANTHONORAIRE" value="<?= $donne['MONTANTHONORAIRE']?>" name="MONTANTHONORAIRE" disabled>
									<? } else { ?> 
									<input type="number" class="form-control" id="MONTANTHONORAIRE" placeholder="Montant honoraire" name="MONTANTHONORAIRE" disabled>
									<? }?> 
									</div>
								</div> 
							</div> 
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
									<label>Numéro affaire</label>
									<? if (isset($_GET['id'])){?>
									<input type="text" class="form-control" id="inputAddresse" value="<?= $donne['NUMAFFAIRE']?>" name="NUMAFFAIRE">
									<? } else { ?> 
									<input type="text" class="form-control" id="inputAddresse" placeholder="Numéro affaire" name="NUMAFFAIRE">
									<? }?> 
									</div>
								</div>
								<div class="col-md-6">   
								<div class="form-group">
									<label>Durée</label>
									<? if (isset($_GET['id'])){?>
									<input type="text" style="text-transform: uppercase;" class="form-control"   value="<?php echo $donne['DUREE'];?>"  name="DUREE">
									<? } else { ?> 
									<input type="text" style="text-transform: uppercase;" class="form-control"  placeholder="Durée" name="DUREE">
									<? }?> 
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Date commande</label>
										<? if (isset($_GET['id'])){?>										
										<input type="date" class="form-control" id="inputnom" value="<?php echo $donne['DATECOMMANDE'];?>" name="DATECOMMANDE">
										<? } else { ?> 
										<input type="date" class="form-control" id="inputnom" placeholder="Date commande" name="DATECOMMANDE">
										<? }?> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Date 1ère visite</label>
										<? if (isset($_GET['id'])){?>
										<input type="date" class="form-control" id="inputnom" value="<?php echo $donne['DATEDEMARRAGE'];?>" name="DATEDEMARRAGE">
										<? } else { ?> 
										<input type="date" class="form-control" id="inputnom" placeholder="Date 1ère visite" name="DATEDEMARRAGE">
										<? }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
								 <div class="form-group row">
								<label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Taxes</label>
								<div class="col-sm-9">
								<div class="form-check form-check-info">
									<label class="form-check-label">
									<? if (isset($_GET['id']) && ($_POST['EXONERETVA'])==1){ ?>
									<input type="checkbox" name="EXONERETVA" value="<? $_POST['EXONERETVA'];?>" class="form-check-input" checked> Exonérée TVA <i class="input-helper"></i></label>
									<? } else { ?> 
									<input type="checkbox" name="EXONERETVA" class="form-check-input" > Exonérée TVA <i class="input-helper"></i></label>
									<? }?> 
								</div>
								<div class="form-check form-check-danger">
									<label class="form-check-label">
									<? if (isset($_GET['id']) && ($_POST['PRECOMPTETVA'])==1){?>
									<input type="checkbox" name="PRECOMPTETVA" value="<? $_POST['PRECOMPTETVA'];?>"  class="form-check-input" checked > Précompte TVA <i class="input-helper"></i></label>
									<? } else { ?> 
									<input type="checkbox" name="PRECOMPTETVA" class="form-check-input" > Précompte TVA <i class="input-helper"></i></label>
									<? }?> 
								</div>   
								</div>
								</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<label>Types d'intervention</label>
									<? if (isset($_GET['id'])){?>
									<textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="TYPEINTERVENTION"><?= $donne['TYPEINTERVENTION']?></textarea>
									<? } else { ?> 
									<textarea class="form-control" placeholder="Types d'intervention" id="floatingTextarea2" style="height: 100px" name="TYPEINTERVENTION"></textarea>
									<? }?> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-check form-check-danger">
											<label class="form-check-label">
											<? if (isset($_GET['id']) && ($_POST['PRECOMPTETVA'])){?>
											<input type="checkbox" class="form-check-input" checked >Facturée à la même adresse <i class="input-helper"></i></label>
											<? } else { ?> 
											<input type="checkbox" class="form-check-input" >Facturée à la même adresse <i class="input-helper"></i></label>
											<? }?> 
										</div> 
									</div> 
								</div> 	
								
								<div class="col-md-6">
									<div class="form-group">
									<label>Adresse de facturation</label>
									<? if (isset($_GET['id'])){?>
									<textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="ADRESSEFACTURATION"><?= $donne['ADRESSEFACTURATION']?></textarea>
									<? } else { ?> 
									<textarea class="form-control" placeholder="Adresse de facturation<" id="floatingTextarea2" style="height: 100px" name="ADRESSEFACTURATION"></textarea>
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
                <h4 class="card-title">Listes des commandes </h4>
               
                <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                              <th></th>
                              <th>N°Commande</th> 
                              <th>Affaire</th>    
                              <th>Missions</th>
                              <th>Code client</th>
                              <th>Nom client</th>
                              <th>N° Affaire</th>
                              <th>Date commande</th>         
                              <th>Montant honoraire</th>   
                              <th>Durée</th>   
							  <th>Date 1ère visite</th>  
							  <th>Exonérée TVA</th>  
							  <th>Précompte TVA</th>
							  <th>Types d'intervention</th> 							  
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th></th>
                              <th>N°Commande</th> 
                              <th>Offre</th>    
                              <th>Missions</th>
                              <th>Code client</th>
                              <th>Nom client</th>
                              <th>N° Affaire</th>
                              <th>Date commande</th>         
                              <th>Montant honoraire</th>   
                              <th>Durée</th>     
							  <th>Date 1ère visite</th>  
							  <th>Exonérée TVA</th>  
							  <th>Précompte TVA</th>
							  <th>Types d'intervention</th> 	
                              </tr>
                            </tfoot>
                            <tbody>
                              <? 
                              $i = 0;
                             // $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT commandes.IDCOMMANDES,commandes.NUMCOMMANDE,commandes.IDOFFRES,commandes.DATECOMMANDE,commandes.MONTANTHONOTAIRE,commandes.DATEDEMARRAGE,commandes.DUREE,commandes.NUMAFFAIRE,commandes.DATEDEMARRAGE,commandes.ADRESSEFACTURATION,commandes.EXONERETVA,commandes.PRECOMPTETVA,commandes.TYPEINTERVENTION,offres.AFFAIRE,offres.IDCONTACTS,clients.NUMCLIENT,clients.SOCIETE,offres.AFFAIRE,offres.MISSIONS
							  FROM offres,clients,commandes
							  WHERE offres.IDOFFRES=commandes.IDOFFRES
							  AND clients.IDCONTACTS=offres.IDCONTACTS
							  ORDER BY ANNEE DESC");
                              while($donnees = $reponse->fetch()){
                                ?>
                               <tr>
                                <?$date=explode("-",$donnees['DATECOMMANDE'])?>
								<td><a href="commandes.php?id=<?php echo $donnees['IDCOMMANDES'];?>">Choisir </a></td> 
                                <td><?= $donnees['NUMCOMMANDE']?></td>
                                <td width=1%><?= sautpoint(sautligne(utf8_encode($donnees['AFFAIRE'])))?></td>
                                <td><?= sautpoint(sautligne(utf8_encode($donnees['MISSIONS'])))?></td> </p>
								<td><?= $donnees['NUMCLIENT']?></td>    
								<td><?= $donnees['SOCIETE']?></td>    
								<td><?= $donnees['NUMAFFAIRE']?></td>   
								<td><?= $date[2].'/'.$date[1].'/'.$date[0]?></td> 								 
                                <td><?= number_format($donnees['MONTANTHONOTAIRE'], 0, ',', ' ');?>F CFA</td> 
                                <td><?= $donnees['DUREE']?></td>    
								<?$dater=explode("-",$donnees['DATEDEMARRAGE'])?>
								<!--td><?//= $dater[2].'/'.$dater[1].'/'.$dater[0]?></td--> 	
                                <td><?= $donnees['EXONERETVA']?></td>       
                                <td><?= $donnees['PRECOMPTETVA']?></td> 
								<td><?= $donnees['TYPEINTERVENTION']?></td> 
                                <td><?= $donnees['ADRESSEFACTURATION']?></td> 
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
 <? require '../footer.php'; ?>