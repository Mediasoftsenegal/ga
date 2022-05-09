<?php require '../header.php'; ?>
        <!--div class="main-panel"-->
          <div class="content-wrapper">            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Liste des clients et recherches</h4>
                    
            				<button type="button" class="btn btn-gradient-danger btn-sm"  data-toggle="modal" data-target="#ajoutclient" style="float: right;"> Nouveau client </button>
                  </div>
                  <div class="card-body">
            				<div class="template-demo mt-4"> 
                        <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
								<th>N°Client</th>
                                <th>Contact</th>
                                <th>Société</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>                        
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>N°Client</th>
                                <th>Contact</th>
                                <th>Société</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>                        
                                <th>Actions</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT * FROM clients");
                              while($donnees = $reponse->fetch()){
                                ?>
                              <tr>
                                <td width=1%><?= $donnees['NUMCLIENT']?></td>
                                <td><?= $donnees['CIVILTE'].$donnees['PRENOM_NOM'] ?></td>
                                <td><?= $donnees['SOCIETE']?></td>  
                                <td><?= utf8_encode($donnees['ADRESSE'])?></td>            
                                <td><?= $donnees['TELMOBILE'].' / '.$donnees['TELBUREAU']?></td>       
                                <td align="center">
                                  <a href="details.php?det=<?= $donnees['IDCONTACTS']?>"><i class="mdi mdi-clipboard-outline"></i></a>
                                  <a href="modifcl.php?mo=<?= $donnees['IDCONTACTS']?>"><i class="mdi mdi-pencil"></i></a>
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
<<form class="row g-6" action="douguel.php" method="POST">
  <div class="modal fade" id="ajoutclient"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 1080px!important;">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Groupe-Alpages :Nouveau client</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-content modal-content-scrollable">
          <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Code Client</label>
                <input type="text" class="form-control" placeholder="Code client" name="NumClient">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Société</label>
                <input type="text" class="form-control" id="inputsociete" placeholder="Société" name="Societe">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Civilité</label>
                <select name="Civilite" class="form-control">
                  <option>Civilité</option>
                  <option value="Mr">Monsieur</option>
                  <option value="Mme">Madame</option>
                  <option value="Mlle">Mademoiselle</option>
                </select>
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Prénom Nom</label>
                <input type="text" class="form-control" id="inputnom" placeholder="Prénom & Nom" name="Prenom_s_et_nom">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Adresse</label>
                <input type="text" class="form-control" id="inputAddresse" placeholder="Adresse" name="Adresse">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Ville</label>
                <input type="text" class="form-control" id="inputCity" placeholder="Ville" name="Ville">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Code Postal</label>
                <input type="number" class="form-control" id="inputZip" placeholder="Code Postale" name="Bp">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Statut</label>
                <input type="text" class="form-control" id="inputZip" placeholder="Statut" name="Statut">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Mobile</label>
                <input type="tel" class="form-control" id="inputphone1" placeholder="Téléphone Mobile" name="Mobile">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Fixe</label>
                <input type="tel" class="form-control" id="inputphone2" placeholder="Téléphone Fixe" name="Fixe">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Fax</label>
                <input type="tel" class="form-control" id="inputphone2" placeholder="Fax" name="Fax">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Mail</label>
                <input type="email" class="form-control" id="inputZip" placeholder="Mail" name="Mail">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Type contact</label>
                <input type="text" class="form-control" id="inputZip" placeholder="Type contact" name="Type">
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                <label>ExonereTVA</label>
                <input type="checkbox" class="form-control" name="ExonereTVA">
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                <label>PrecompteTVA</label>
                <input type="checkbox" class="form-control" name="PrecompteTVA">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Etat contact</label>
                <input type="text" class="form-control" id="inputAddresse" placeholder="Etat contact" name="Etat_contact">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Causes</label>
                <input type="text" class="form-control" id="inputAddresse" placeholder="Causes" name="Causes">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Décisions</label>
                <input type="text" class="form-control" id="inputAddresse" placeholder="Décisions" name="Decisions">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Observation</label>
                <textarea class="form-control" placeholder="Observations" id="floatingTextarea2" style="height: 100px" name="Observations"></textarea>
              </div>
            </div>   
            </div> 
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary" name="bt_client">Ajouter</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<?php require '../footer.php'; ?>