<?php require 'header.php'; ?>
<body>
        <div class="main-panel">
          <div class="content-wrapper">            
              <div class="col-md-7">
                <!--div class="card"-->
                  <div class="card-header">
                    <h4 class="card-title">Gestion administratives : Module des offres</h4>
            				<button type="button" class="btn btn-gradient-danger btn-sm"  data-toggle="modal" data-target="#ajoutclient" style="float: right;"> Nouvelle Offre </button>
                  </div>
                  <div class="card-body">
            				<div class="template-demo mt-4"> 
                        <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                   <th> N °Offre </th>
                                   <th> Affaire </th>
                                   <th> Client</th>
                                   <th> Montant </th>                       
                                   <th>Actions</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                 <th> N °Offre </th>
                                 <th> Affaire </th>
                                 <th> Client</th>
                                <th> Montant </th>                      
                                <th>Actions</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT * FROM offres INNER JOIN clients ON offres.`IDCONTACTS` = clients.`IDCONTACTS`
                              ORDER BY`DATEACQUISITION` DESC");
                              while($donnees = $reponse->fetch()){
                                ?>
                              <tr>
                                <td width=1%><?= $donnees['NUMOFFRE']?></td>
                                <td><?= $donnees['AFFAIRE'] ?></td>
                                <td><?= $donnees['PRENOM_NOM']?></td>  
                                <td><?= $donnees['MONTANTHONORAIRE']?></td>            
                                   
                                <td align="center">
                                  <a href="details.php?det=<?= $donnees['IDOFFRES']?>"><i class="mdi mdi-clipboard-outline"></i></a>
                                  <a href="modifcl.php?mo=<?= $donnees['IDOFFRES']?>"><i class="mdi mdi-pencil"></i></a>
                                </td>
                              </tr>
                              <?php } $reponse->closeCursor(); ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                  </div>
                <!--/div-->		   
              </div>
              <div class="col-md-3">
              <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informations du client <?= $donnees['Prenom_s_et_nom']?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label>Numéro client</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['NumClient']?>">
                            </div>
                            <div class="col-8">
                                <label>Prénom Nom</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Civilite'].' '.$donnees['Prenom_s_et_nom']?>">
                            </div>
                            <div class="col-8">
                                <label>Adresse</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Adresse']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-8">
                                <label>Société</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Societe']?>">
                            </div>
                            <div class="col-8">
                                <label>Téléphone</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Fixe'].' / '.$donnees['Mobile']?>">
                            </div>
                            <div class="col-8">
                                <label>Mail</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Mail']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-8">
                                <label>Bureau</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Bureau']?>">
                            </div>
                            <div class="col-8">
                                <label>Ville</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Ville']?>">
                            </div>
                            <div class="col-8">
                                <label>Boîte Postal</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Bp']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12">
                                <label>Observations</label>
                                <textarea class="form-control" cols="30" rows="10" readonly><?= $donnees['Observations']?></textarea>
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
                <label>Client (Ecrire le nom du client pour effectuer une recherche)</label>
                <select name="id_contact" class="form-control">
                    <?php $repons = $db->query("SELECT * FROM clients");
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
                   <input type="date" class="form-control" id="inputnom" placeholder="Prénom & Nom" name="Date acquisition">
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
                <input type="number" class="form-control" id="inputCity" placeholder="Montant_honoraire" name="Ville">
                 </div>
              </div>
              </div>
              <div class="row">
        <div class="col-md-6">
            <div class="form-group"> <label>Personnel</label> 
            
            <select class="form-group" multiple="" data-placeholder="Choisir un ingénieur" name="perso[]" multiple="multiple" id="perso" style="width: 100%;" aria-hidden="true">
                    <?php 
					$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
					$repons = $db->query("SELECT * FROM perso where MEMBRE=1 And PROFESSION like 'INGENIEUR'");
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

<script>
$(document).ready(function() {
$("#perso").select2();
});
</script>


</body>
<?php require 'footer.php'; ?>