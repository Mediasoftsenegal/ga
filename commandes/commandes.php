<?php 
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];
require '../header.php'; ?>
        <!--div class="main-panel"-->
          <div class="content-wrapper">            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Gestion administrative : Module des commandes</h4>
                   
            				<button type="button" class="btn btn-gradient-danger btn-sm"  data-toggle="modal" data-target="#ajoutclient" style="float: right;"> Nouvelle commande </button>
                  </div>
                  <div class="card-body">
            		<div class="template-demo mt-4"> 
                        <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Année</th> 
                                <th>N°commande</th>    
								<th>Offre</th>
                                <th>Missions proposées</th>
                                <th>N°Client</th>
                                <th>Client</th>
                                <th>Montant Honoraire</th>         
                                <th>N°Affaire</th>   
                                <th>Durée</th>          
								<th>Date commande</th> 
								<th>Date 1ère visite</th> 
								<th>Exonérée TVA</th> 
								<th>Précompte TVA</th> 
								<th>Types interventions</th> 
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Année</th> 
                                <th>N°commande</th>    
								<th>Offre</th>
                                <th>Missions proposées</th>
                                <th>N°Client</th>
                                <th>Client</th>
                                <th>Montant Honoraire</th>         
                                <th>N°Affaire</th>   
                                <th>Durée</th>          
								<th>Date commande</th> 
								<th>Date 1ère visite</th> 
								<th>Exonérée TVA</th> 
								<th>Précompte TVA</th> 
								<th>Types interventions</th> 
                                <th>Actions</th>				
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT commandes.IDCOMMANDES,commandes.NUMCOMMANDE,commandes.DATECOMMANDE,commandes.MONTANTHONOTAIRE,commandes.DATEDEMARRAGE, commandes.DUREE,commandes.NUMAFFAIRE,commandes.ADRESSEFACTURATION,commandes.EXONERETVA,commandes.PRECOMPTETVA,commandes.TYPEINTERVENTION, offres.AFFAIRE,offres.NUMOFFRE,offres.MAITREOEUVRE,offres.missions,clients.NUMCLIENT,clients.SOCIETE,clients.PRENOM_NOM FROM commandes,offres,clients WHERE commandes.IDOFFRES=offres.IDOFFRES AND clients.IDCONTACTS=offres.IDCONTACTS");
                              while($donnees = $reponse->fetch()){
  
                                ?>
                              <tr>
                                <?$date=explode("-",$donnees['DATECOMMANDE'])?>
								<?$dates=explode("-",$donnees['DATEDEMARRAGE'])?>
								<? if($donnees['EXONERETVA']=0){
								$nvalexo='NON EXONEREE';?>
                                <td><?= $date[0]?> </td>
								<td width=1%><?= $donnees['NUMCOMMANDE']?></td>
                                <td><?= utf8_encode($donnees['AFFAIRE'])?></td> 
                                <td><?= $donnees['missions']?></td>  
                                <td><?= $donnees['NUMCLIENT'] ?></td>    
								<td><?= $donnees['CIVILTE'].$donnees['PRENOM_NOM'] ?></td>                                       
                                <td><?= number_format($donnees['MONTANTHONOTAIRE'], 0, ',', ' ');?>F CFA</td> 
                                <td><?= $donnees['NUMAFFAIRE']?></td>    
                                <td><?= $donnees['DUREE']?></td>       
                                <td><?= $date[2].'/'.$date[1].'/'.$date[0]?></td>  
								<td><?= $dates[2].'/'.$dates[1].'/'.$dates[0]?></td>  
                                <td><?= $donnees['EXONERETVA']?></td>   
								<td><?= $donnees['PRECOMPTETVA']?></td> 
								<td><?= $donnees['TYPEINTERVENTION']?></td> 
                                <td align="center">
                                  <a href="details.php?det=<?= $donnees['IDCOMMANDES']?>"><i class="mdi mdi-clipboard-outline"></i></a>
                                  <a href="modif_com.php?mo=<?= $donnees['IDCOMMANDES']?>"><i class="mdi mdi-pencil"></i></a>
                                </td>
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
      </div>
          <!-- content-wrapper ends -->
<!-- Modal -->
<form class="row g-6" action="../douguel.php" method="POST">
  <div class="modal fade" id="ajoutclient"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 1080px!important;">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Groupe-Alpages :Ajout d'une nouvelle commande</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-content modal-content-scrollable">
          <div class="modal-body">
          <div class="row">
          <div class="col-md-4"> 
               <div class="form-group">
			   <div class="form-group">
                <label>Numéro commande</label>
                <input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip" placeholder="Numéro commande" name="NUMCOMMANDE">
              </div>
                <label>Date Commande</label>
                   <input type="date" class="form-control" id="inputnom" placeholder="Date commande" name="dateacquisition">
               </div>
               
          </div> 
          <div class="col-md-8">
              <div class="form-group">
                 <label>Affaire</label>
					<select name="affaire" class="form-control">
                    <?php $repons = $db->query("SELECT IDOFFRES,AFFAIRE FROM offres ORDER BY AFFAIRE ASC");
                    while($donnee = $repons->fetch()){?>
                    <option value="<?= $donnee['IDOFFRES']?>"><?=  utf8_encode($donnee['AFFAIRE'])?></option>
                    <?php } $repons->closeCursor();?>
                </select>
				<div class="form-group">
                 <label>Missions Proposées</label>
                 <textarea class="form-control" placeholder="Missions Proposées" id="floatingTextarea2" style="height: 100px" name="missions"></textarea>
              </div>
              </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label> N° Client</label>
                <input type="text" class="form-control" id="numclient" placeholder="N° client" name="numclient">
              </div>
             </div>
          
          <div class="col-md-8">  
            <div class="form-group">
                <label>Client</label>
                <input type="text" class="form-control" id="societe" placeholder="Nom du Client" name="nomclient">
            </div>
          </div>
          </div>

          <div class="row">
            <div class="col-md-4">  
              <div class="form-group">
                <label>N° Affaire</label>
                <input type="text" class="form-control" id="inputsociete" placeholder="N° Affaire" name="NUMAFFAIRE">
              </div>
              </div>  
              <div class="col-md-4">  
                <div class="form-group">
                <label>Montant Honoraire HT</label>
                <input type="number" class="form-control" id="inputCity" placeholder="Montant honoraire" name="Montant_honoraire"> 
                 </div>
              </div> 
            </div> 
            <div class="row">
              <div class="col-md-4">  
                  <div class="form-group">
                   <label>Durée</label>
                   <input type="text" class="form-control" id="inputAddresse" placeholder="Durée" name="duree">
                 </div>
              </div>
              <div class="col-md-4">   
              <div class="form-group">
                 <label>Date 1ère visite</label>
                  <input type="date" class="form-control" id="inputAddresse" placeholder="Date 1ère visite" name="DATEDEMARRAGE">
              </div>
              </div>
			  <div class="col-md-4">   
              <div class="form-group">
                 <label>Taxes</label>
                  <div class="form-group">
                           
					<div class="form-check form-check-info">
                       <label class="form-check-label">
						<input type="checkbox" class="form-check-input" > Exonérée TVA <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check form-check-danger">
                      <label class="form-check-label">
                       <input type="checkbox" class="form-check-input" > Précompte TVA <i class="input-helper"></i></label>
                    </div>      
                </div>
              </div>
              </div>
              </div>
              <div class="row">
        <div class="col-md-6">
            <div class="form-group"> 
			<label>Types d'interventions</label> 
             <textarea class="form-control" placeholder="Types d'interventions" id="floatingTextarea2" style="height: 100px" name="typeintervention"></textarea>
			</div> 
		</div>	
		 <div class="col-md-6">
			<label>Adresse de facturation</label> 
             <textarea class="form-control" placeholder="Adresse de facturation" id="floatingTextarea2" style="height: 100px" name="ADRESSEFACTURATION"></textarea>
			
        </div>
    </div>

    <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary" name="bt_offre">Ajouter</button>
            </div>
        </div>
      </div>
    </div>
  </div>
  
</form>
<?php require '../footer.php'; ?>