<?php require '../header.php'; ?>
        <!--div class="main-panel"-->
          <div class="content-wrapper">            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Gestion administrative : Module des offres</h4>
                   
            				<button type="button" class="btn btn-gradient-danger btn-sm"  data-toggle="modal" data-target="#ajoutclient" style="float: right;"> Nouvelle Offre </button>
                  </div>
                  <div class="card-body">
            		 <div class="template-demo mt-4"> 
                        <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Année</th> 
                                <th>N°offre</th>    
                                <th>Affaire</th>
                                <th>Montant</th>
                                <th>contact</th>
                                <th>Date acquisition</th>
                                <th>Maître d'oeuvre</th>         
                                <th>Autres infos</th>   
                                <th>Montant honoraire</th>          
                                <th>Personne ressource</th>   
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Année</th> 
                                <th>N°offre</th>    
                                <th>Affaire</th>
                                <th>Montant</th>
                                <th>contact</th>
                                <th>Date acquisition</th>
                                <th>Maître d'oeuvre</th>         
                                <th>Autres infos</th>   
                                <th>Montant honoraire</th>          
                                <th>Personne ressource</th>   
                                <th>Actions</th>
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
                              // $sql="SELECT PRENOMNOM FROM perso WHERE IDPERSONNEL=".$donnees['IDPERSONNEL'];
                              
                             // $rep=$db->query($sql);
                            //  $don = $reponse->fetch();
                            //  $prenom=$don['PRENOMNOM'];
                              
                            
                                ?>
                              <tr>
                                <?$date=explode("-",$donnees['DATEACQUISITION'])?>
                                <td><?= $donnees['ANNEE']?></td>
                                <td width=1%><?= $donnees['NUMOFFRE']?></td>
                                <td><?= utf8_encode($donnees['AFFAIRE'])?></td> 
                                <td><?= $donnees['MONTANT']?></td>  
                                <td><?= $donnees['CIVILTE'].$donnees['PRENOM_NOM'] ?></td>                                    
                                <td><?= $date[2].'/'.$date[1].'/'.$date[0]?></td> 
                                <td><?= $donnees['MAITREOEUVRE']?></td>    
                                <td><?= $donnees['AUTRES_INFOS']?></td>       
                                <td><?= number_format($donnees['MONTANTHONORAIRE'], 0, ',', ' ');?>F CFA</td>  
                                <td><?= ''?></td>   
                                <td align="center">
                                  <a href="details.php?det=<?= $donnees['IDOFFRES']?>"><i class="mdi mdi-clipboard-outline"></i></a>
                                  <a href="modif_offr.php?mo=<?= $donnees['IDOFFRES']?>"><i class="mdi mdi-pencil"></i></a>
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
<form class="row g-6" action="douguel.php" method="POST">
  <div class="modal fade" id="ajoutclient"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 1080px!important;">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Groupe-Alpages :Ajout d'une nouvelle offre</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-content modal-content-scrollable">
          <div class="modal-body">
          <div class="row">
          <div class="col-md-6"> 
              <div class="form-group">
                <label>Numéro offre</label>
                <input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip" placeholder="Numéro offre" name="num_offre">
              </div>
          </div> 
          <div class="col-md-6">
              <div class="form-group">
                 <label>Affaire</label>
                 <textarea class="form-control" placeholder="Affaires" id="floatingTextarea2" style="height: 100px" name="affaire"></textarea>
              </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label> Choisir un Client (Ecrire le nom du client pour effectuer une recherche)</label>
                
                <select name="id_contact" class="form-control">
                    <?php $repons = $db->query("SELECT IDCONTACTS,SOCIETE FROM clients ORDER BY SOCIETE ASC");
                    while($donnee = $repons->fetch()){?>
                    <option value="<?= $donnee['IDCONTACTS']?>"><?= $donnee['SOCIETE']?></option>
                    <?php } $repons->closeCursor();?>
                </select>
              </div>
             </div>
          
          <div class="col-md-6">  
            <div class="form-group">
                <label>Montant offre</label>
                <input type="number" class="form-control" id="inputsociete" placeholder="Montant" name="montant">
            </div>
          </div>
          </div>

          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label>Maître d'oeuvre</label>
                <input type="text" class="form-control" id="inputsociete" placeholder="Maître d'oeuvre" name="maitre_oeuvre">
              </div>
              </div>  
              <div class="col-md-6">  
                  <div class="form-group">
                   <label>Date acquisition</label>
                   <input type="date" class="form-control" id="inputnom" placeholder="Date acquisition" name="dateacquisition">
                  </div>
              </div> 
            </div> 
            <div class="row">
              <div class="col-md-6">  
                  <div class="form-group">
                   <label>Autres infos</label>
                   <input type="text" class="form-control" id="inputAddresse" placeholder="Autres infos" name="autre_infos">
                 </div>
              </div>
              <div class="col-md-6">   
                <div class="form-group">
                <label>Montant Honoraire</label>
                <input type="number" class="form-control" id="inputCity" placeholder="Montant honoraire" name="Montant_honoraire">
                 </div>
				  <div class="form-group">
                <label>Missions offertes</label>

				 <textarea class="form-control" placeholder="Missions offertes" id="floatingTextarea2" style="height: 100px" name="missions"></textarea>
                 </div>
              </div>
              </div>
              <div class="row">
        <div class="col-md-6">
            <div class="form-group"> <label>Personnel</label> 
            
            <select class="form-group" data-placeholder="Choisir un ingénieur" name="id_personnel" id="perso" style="width: 100%;" aria-hidden="true">
                    <?php 
					$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
					$repons = $db->query("SELECT * FROM perso where PROFESSION like 'INGENIEUR'");
                    while($donnee = $repons->fetch()){?>
                    <option value="<?= $donnee['IDPERSONNEL']?>"><?= $donnee['PRENOMNOM']?></option>
                    <?php } $repons->closeCursor();?>
          </select> 
        </div> <!-- /.form-group -->

        </div> <!-- /.col -->
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