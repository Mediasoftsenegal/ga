<?php session_start();
require '../headers.php'; 
    include('conf.php');	 
	?>
        <!--div class="main-panel"-->
          <div class="content-wrapper">            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Liste des carnets d'activité</h4><? echo 'Utilisateur :  '.$_SESSION["nom_afficher"].'-'.$_SESSION["IDPERSONNEL"]?>
					<div class="col-md-2">
          <br>
					<div class="template-demo d-lg-flex justify-content-between">
				  <a href="edit_carnet.php"><button type="button" class="btn btn-gradient-info btn-sm"  style="float: left;"> Edition CA</button></a> 
				  <a href="form_carnet.php"><button type="button" class="btn btn-gradient-danger btn-sm"  style="float: justify;">Nouveau</button></a> 
                    </div>
					</div>
            		</div>
                  <div class="card-body">
            				<div class="template-demo mt-4"> 
                        <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Prénom et Nom</th>
                                <th>Affaire</th>
                                <th>Semaine</th>
                                <th>Date affaire</th>
                                <th>Temps ext.</th>    
								<th>Temps bureau</th>
                                <th>Kilométrage</th>
                                <th>Référence</th>
                                <th>Montant</th>
                                <th>Transport</th>
                                <th>Km 	</th>
                                <th>Nombre</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Prénom et Nom</th>
                                <th>Affaire</th>
                                <th>Semaine</th>
                                <th>Date affaire</th>
                                <th>Temps ext.</th>    
								<th>Temps bureau</th>
                                <th>Kilométrage</th>
                                <th>Référence</th>
                                <th>Montant</th>
                                <th>Transport</th>
                                <th>Km 	</th>
                                <th>Nombre</th>
                                <th>Actions</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT * FROM (carnets INNER JOIN perso ON carnets.IDPERSONNEL = perso.IDPERSONNEL) INNER JOIN offres ON carnets.IDOFFRES = offres.IDOFFRES
                              WHERE carnets.IDPERSONNEL=".$_SESSION["IDPERSONNEL"]);
                              while($donnees = $reponse->fetch()){
                                ?>
                              <tr>
                                <td><?= $donnees['PRENOMNOM'] ?></td>
								<? $snomaff=sautpoint(sautligne($donnees['AFFAIRE']))?>
                                <td><?= utf8_encode($snomaff) ?></td>
                                <td><?= $donnees['SEMAINE'] ?></td>
								<? $dater=explode('-',$donnees['DATE_CONTRAT'])?>
                                <td><? echo($dater[2].'-'.$dater[1].'-'.$dater[0]) ?></td>
                                <td><?= $donnees['TEMPS_EXTER'] ?></td>
                                <td><?= $donnees['TEMPS_BUREAU'] ?></td>
                                <td><?= $donnees['KILOMETRAGE'] ?></td>
                                <td><?= $donnees['REFERENCE'] ?></td>
                                <td><?= $donnees['MTTRANSPORT'] ?></td>
                                <td><?= $donnees['TRANSPORT'] ?></td>
                                <td><?= $donnees['KMTRANSPORT'] ?></td>
                                <td><?= $donnees['BNRETRANSPORT'] ?></td>    
                                <td align="center">
                                  <a href="details.php?det="><i class="mdi mdi-clipboard-outline"></i></a>
                                  <a href="modifcl.php?mo="><i class="mdi mdi-pencil"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Groupe-Alpages :Nouveau carnet</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-content modal-content-scrollable">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-2">
                <label>Employé</label>
              </div>
              <div class="col-md-6">
                <? $reponse = $db->query("SELECT * FROM perso WHERE MEMBRE = 1 AND PROFESSION = 'INGENIEUR' OR PROFESSION = 'JURISTE'"); ?>
                <select name="idpersonnel" class="form-control">
                  <option value="">Choisir Employé</option>
                  <? while($donnees = $reponse->fetch()): ?>
                    <option value="<?= $donnees['IDPERSONNEL']?>"><?= $donnees['PRENOMNOM']?></option>
                  <? endwhile ?>
                </select>
              </div>
              <div class="col-md-4"></div>
            </div><br>
            <div class="row">
              <div class="col-md-2">
                <label>Semaine</label>
              </div>
              <div class="col-md-3">
                <input type="text" name="semaine" class="form-control">
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-2">
                <label>Date d'activité</label>
              </div>
              <div class="col-md-2">
                <input type="date" name="date_contrat" class="form-control">
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-2">
                <label>Affaire</label>
              </div>
              <div class="col-md-10">
                <? $reponse = $db->query("SELECT * FROM offres"); ?>
                <select name="idoffres" class="form-control">
                  <option value="">Choisir Affaire</option>
                  <? while($donnees = $reponse->fetch()): ?>
                    <option value="<?= $donnees['IDOFFRES']?>"><?= $donnees['AFFAIRE']?></option>
                  <? endwhile ?>
                </select>
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-2">
                <label>Temps passé extérieur</label>
              </div>
              <div class="col-md-2">
                <input type="text" name="temps_exter" class="form-control">
              </div>
              <div class="col-md-2">
                <label>Référence</label>
              </div>
              <div class="col-md-4">
                <input type="text" name="reference" class="form-control">
              </div>
              <div class="col-md-2"></div>
            </div><br>
            <div class="row">
              <div class="col-md-2">
                <label>Temps passé bureau</label>
              </div>
              <div class="col-md-2">
                <input type="text" name="temps_bureau" class="form-control">
              </div>
              <div class="col-md-10"></div>
            </div><br>
            <div class="row">
              <div class="col-md-6">
                <div class="custom-control custom-checkbox">
                  <input name="visaing" class="custom-control-input" type="checkbox" id="customCheckbox1">
                  <label for="customCheckbox1" class="custom-control-label">Visa Ingénieur</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="custom-control custom-checkbox">
                  <input name="visares" class="custom-control-input" type="checkbox" id="customCheckbox2">
                  <label for="customCheckbox2" class="custom-control-label">Visa Responsable</label>
                </div>
              </div>
            </div><br>
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">  
              <li class="nav-item">
                <a class="nav-link active" id="transport-tab" data-toggle="pill" href="#transport" role="tab" aria-controls="transport" aria-selected="true">Transport</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" id="perdieme-tab" data-toggle="pill" href="#perdieme" role="tab" aria-controls="perdieme" aria-selected="false">Perdièmes</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" id="frais-tab" data-toggle="pill" href="#frais" role="tab" aria-controls="frais" aria-selected="false">Frais divers/Factures</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" id="repas-tab" data-toggle="pill" href="#repas" role="tab" aria-controls="repas" aria-selected="false">Repas et Hébergement</a>
              </li> 
            </ul><br>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade active show" id="transport" role="tabpanel" aria-labelledby="transport-tab">
                <div class="row">
                  <div class="col-md-2">
                    <label>Moyen de transport</label>
                  </div>
                  <div class="col-md-6">
                    <select name="transport" class="form-control">
                      <option value="">Choisir moyen de transport</option>
                      <option value="Voiture">Voiture</option>
                      <option value="Forfait">Forfait</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <label>Kilomètre transport</label>
                  </div>
                  <div class="col-md-2">
                    <input type="text" name="kmtransport" class="form-control">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2">
                    <label>Justificatif</label>
                  </div>
                  <div class="col-md-6">
                    <textarea name="justiftrans" class="form-control" rows="5"></textarea>
                  </div>
                  <div class="col-md-2">
                    <label>Nombre transport</label>
                  </div>
                  <div class="col-md-2">
                    <input type="text" name="nbretransport" class="form-control">
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="perdieme" role="tabpanel" aria-labelledby="perdieme-tab">
                <div class="row">
                  <div class="col-md-2">
                    <label>Perdièmes</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="perdiem" class="form-control">
                  </div>
                  <div class="col-md-1">
                    <label>Nombre</label>
                  </div>
                  <div class="col-md-3">
                    <input type="number" name="nbreperdiem" class="form-control">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2">
                    <label>Justificatif</label>
                  </div>
                  <div class="col-md-6">
                    <textarea name="justifperdiem" class="form-control" rows="5"></textarea>
                  </div>
                  <div class="col-md-1">
                    <label>Dernier jour</label>
                  </div>
                  <div class="col-md-3">
                    <input type="number" name="dernierjour" class="form-control">
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="frais" role="tabpanel" aria-labelledby="frais-tab">
                <div class="row">
                  <div class="col-md-2">
                    <label>Frais Divers</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="fraisdivers" class="form-control">
                  </div>
                  <div class="col-md-1">
                    <label>Montant</label>
                  </div>
                  <div class="col-md-3">
                    <input type="number" name="mtfraisdivers" class="form-control">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2">
                    <label>Justificatif</label>
                  </div>
                  <div class="col-md-6">
                    <textarea name="justifdivers" class="form-control" rows="5"></textarea>
                  </div>
                  <div class="col-md-1">
                    <label>Avance</label>
                  </div>
                  <div class="col-md-3">
                    <input type="number" name="avances" class="form-control">
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="repas" role="tabpanel" aria-labelledby="repas-tab">
                <div class="row">
                  <div class="col-md-2">
                    <label>Nombre de repas</label>
                  </div>
                  <div class="col-md-2">
                    <input type="text" name="nbrepas" class="form-control">
                  </div>
                  <div class="col-md-2">
                    <label>Justificatif</label>
                  </div>
                  <div class="col-md-6">
                    <textarea name="justifrepas" class="form-control" rows="5"></textarea>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2">
                    <label>Nombre de nuité</label>
                  </div>
                  <div class="col-md-2">
                    <input type="text" name="nbrenuite" class="form-control">
                  </div>
                  <div class="col-md-2">
                    <label>Justificatif</label>
                  </div>
                  <div class="col-md-6">
                    <textarea name="justifnuite" class="form-control" rows="5"></textarea>
                  </div>
                </div>
              </div>
            </div><br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary" name="bt_carnet">Ajouter</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<?php require '../footer.php'; ?>