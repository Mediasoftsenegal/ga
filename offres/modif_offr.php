<?php 
$id_offre = $_GET['mo'];
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
$reponse = $db->query("SELECT IDOFFRES,AFFAIRE,MONTANT,offres.IDCONTACTS,offres.IDPERSONNEL,MAITREOEUVRE,
DATEACQUISITION,AUTRES_INFOS,NUMOFFRE,MONTANTHONORAIRE,ANNEE,PRENOM_NOM,SOCIETE,PRENOMNOM
 FROM offres,clients,perso
 WHERE offres.IDCONTACTS=clients.IDCONTACTS
 AND offres.IDPERSONNEL= perso.IDPERSONNEL
 AND offres.IDOFFRES = '$id_offre'");
$donnees = $reponse->fetch();
?>
<?php require 'header.php'; ?>
<div class="content-wrapper">            
    <div class="col-lg-12 stretch-card">
       <div class="card">
            <div class="card-header">
                <h4 class="card-title">Gestion administrative : Module des offres</h4>
				<div class="col-12">
					<div class="card">
						<div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Modification d'une offre</h4>
                    <form action="douguel.php" method="POST">
                      <p class="card-description"> Détails de l'offre</p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Année</label>
                            <div class="col-sm-9">
							  <input type="i" class="form-control" name="IDOFFRES" value="<?= $id_offre ?>" />
                              <input type="text" class="form-control" name="ANNEE" value="<?= $donnees['ANNEE']?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">N° Offre</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="NUMOFFRE" value="<?= $donnees['NUMOFFRE']?>" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Affaire</label>
                            <div class="col-sm-9">
							  <textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="AFFAIRE"><?=$donnees['AFFAIRE']?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Montant</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="MONTANT" value="<?= $donnees['MONTANT']?>" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact</label>
                            <div class="col-sm-9">
							   <select name="IDCONTACTS" class="form-control">
							   <option value="<?= $donnee['IDCONTACTS']?>"><?= $donnees['SOCIETE']?></option>
								<?php $repons = $db->query("SELECT IDCONTACTS,SOCIETE FROM clients ORDER BY SOCIETE ASC");
								
								while($donnee = $repons->fetch()){?>
								<option value="<?= $donnee['IDCONTACTS']?>"><?= $donnee['SOCIETE']?></option>
								<?php } $repons->closeCursor();?>
							</select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date acquisition</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label"></label>
                                  <input type="date" class="form-control" name="DATEACQUISITION"  value="<?= $donnees['DATEACQUISITION']?>" />  
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Maître d'oeuvre </label>
                            <div class="col-sm-9">
                              <input type="text" name="MAITREOEUVRE" class="form-control" value="<?= $donnees['MAITREOEUVRE']?>" />
                            </div>
                          </div>
                        </div>
                       </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Autres infos</label>
                            <div class="col-sm-9">
                              <input type="text" name="AUTRES_INFOS" class="form-control" value="<?= $donnees['AUTRES_INFOS']?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Montant honoraire</label>
                            <div class="col-sm-9">
                              <input type="text" name="MONTANTHONORAIRE" class="form-control" value="<?= $donnees['MONTANTHONORAIRE']?>"  />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personne ressource</label>
                            <div class="col-sm-9">
                             <select name="IDPERSONNEL" class="form-control">
							   <option value="<?= $donnee['IDPERSONNEL']?>"><?= $donnees['PRENOMNOM']?></option>
								<?php $repons = $db->query("SELECT IDPERSONNEL,PRENOMNOM FROM perso ORDER BY PRENOMNOM ASC");
								
								while($donnee = $repons->fetch()){?>
								<option value="<?= $donnee['IDPERSONNEL']?>"><?= $donnee['PRENOMNOM']?></option>
								<?php } $repons->closeCursor();?>
							</select>
                            </div>
                          </div>
                        </div>
                       
                      </div>
					   <div class="card-footer">
                        <button class="btn btn-inverse-info" onclick="history.back()">Retour</button>
                        <button class="btn btn-inverse-primary" name="modifoff">Valider</button>
                    </div>
                    </form>
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
<?php require 'footer.php'; ?>