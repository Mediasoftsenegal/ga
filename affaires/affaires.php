<?php require '../header.php'; ?>
        <!--div class="main-panel"-->
          <div class="content-wrapper">            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Gestion administrative : Module des Affaires</h4>
                    <!--form class="form-inline" method="POST" action="clients.php">
                      <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="prenomnom" placeholder="Prénom et nom">
                      <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="societe" placeholder="Société">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mb-2">Recherche</button>
                    </form-->
            				<button type="button" class="btn btn-gradient-danger btn-sm"  data-toggle="modal" data-target="#ajoutclient" style="float: right;"> Nouvelle Affaire </button>
                  </div>
                  <div class="card-body">
            				<div class="template-demo mt-4"> 
                        <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th> Date signature</th>
								<th> N° commande</th>
								<th> Libellé affaire 	 </th>
								<th> Lieu </th>
								<th> Année</th>
								<th> Observations</th>
								<th> Client</th>
								<th> Nbre de visite Prév.</th>
								<th> Nbre de visite Réal.</th>
								<th> Date Fin</th>
								<th> Date reprise</th>
								<th> Etat</th>
								<th> Actions </th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th> Date signature</th>
								  <th> N° commande</th>
								  <th> Libellé affaire 	 </th>
								  <th> Lieu </th>
								  <th> Année</th>
								  <th> Observations</th>
								  <th> Client</th>
								  <th> Nbre de visite Prév.</th>
								  <th> Nbre de visite Réal.</th>
								  <th> Date Fin</th>
								  <th> Date reprise</th>
								  <th> Etat</th>
								  <th> Actions </th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT IDAFFAIRES,IDCOMMANDES,DATESIGNATURE,LIEU,ETAT,ANAFF,OBSERVATIONS,`CLIENT`,
							   NBREVISITESPREV,NBREVISITESREAL,DATEFIN,DATEREPRISE,offres.AFFAIRE,offres.NUMOFFRE
							   FROM affaires,offres
                               WHERE affaires.IDOFFRES=offres. IDOFFRES
                               ORDER BY ANAFF DESC");
                              while($donnees = $reponse->fetch()){
                              // $sql="SELECT PRENOMNOM FROM perso WHERE IDPERSONNEL=".$donnees['IDPERSONNEL'];
                              
                             // $rep=$db->query($sql);
                            //  $don = $reponse->fetch();
                            //  $prenom=$don['PRENOMNOM'];         
								$dats=explode("-",$donnees['DATESIGNATURE']);
								
                                ?>
                              <tr>
                                 <td><?php echo ($dats[2].'-'.$dats[1].'-'.$dats[0]); ?></td>
								  <td><?php echo htmlspecialchars($donnees['NUMOFFRE']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['AFFAIRE']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['LIEU']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['ANAFF']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['OBSERVATIONS']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['CLIENT']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['NBREVISITESPREV']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['NBREVISITESREAL']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['DATEFIN']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['DATEREPRISE']); ?></td>
								  <td><?php echo htmlspecialchars($donnees['ETAT']); ?></td>
								  <td align="center">
                                  <a href="details.php?det=<?= $donnees['IDAFFAIRES']?>"><i class="mdi mdi-clipboard-outline"></i></a>
                                  <a href="modifcl.php?mo=<?= $donnees['IDAFFAIRES']?>"><i class="mdi mdi-pencil"></i></a>
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
              </div>
              </div>
              <div class="row">
				<div class="col-md-6">
					<div class="form-group"> <label>Personnel</label> 
					<select class="form-group" data-placeholder="Choisir un ingénieur" name="id_personnel" id="perso" style="width: 100%;" aria-hidden="true">
							<?php 
							$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
							$repons = $db->query("SELECT * FROM perso WHERE PROFESSION LIKE 'INGENIEUR'");
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

</body>
<?php require '../footer.php'; ?>
