<?php require '../header.php'; ?>
<?php if (isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
    $id_client=$_GET['id'];
	 $reponse = $db->query("SELECT * FROM clients WHERE clients.IDCONTACTS = $id_client");
	 $donne = $reponse->fetch();
	
	}
?>
        <!--div class="main-panel"-->
          <div class="content-wrapper">            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Module des clients</h4>
                  </div>
			<div class="row">
				<div class="col-md-4 grid-margin stretch-card">
				<div class="bg-secondary p-4">
                    <form class="row g-6" action="yonou.php" method="POST">
							<div class="" style="max-width: 1080px!important;">
								<div class="">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Groupe-Alpages :Détails client</h5>
									</div>
										<!--div class="modal-body"-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
													<label>Code Client</label>
													<?php if (isset($_GET['id'])){?>
													<input type="hidden" class="form-control" id="inputnom" value="<?php echo $donne['IDCONTACTS'];?>" name="IDCONTACTS">
													<input type="text" class="form-control" value="<?php echo $donne['NUMCLIENT'];?>" name="NumClient">
													<?php } else { ?> 
													<input type="text" class="form-control" placeholder="Code client" name="NumClient">
													<?php }?> 
													</div>
												</div>
												<div class="col-md-6">
												<div class="form-group">
													<label>Société</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputsociete" value="<?php echo $donne['SOCIETE'];?>" name="Societe">
													<?php } else { ?> 
													<input type="text" class="form-control" id="inputsociete" placeholder="Société" name="Societe">
													<?php }?>
												</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Civilité</label>
														<select name="Civilite" class="form-control">
														<?php if (isset($_GET['id'])){?>
														<option value="<?= $donne['CIVILITE']?>" selected="selected"><?= $donne['CIVILITE']?></option>
														<?php } else { ?> 
														<option>Civilité</option>
														<option value="Mr">Monsieur</option>
														<option value="Mme">Madame</option>
														<option value="Mlle">Mademoiselle</option>
														<?php }?>
														</select>
													</div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Prénom Nom</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputnom" value="<?php echo $donne['PRENOM_NOM'];?>" name="Prenom_s_et_nom">
													<?php } else { ?> 
													<input type="text" class="form-control" id="inputnom" placeholder="Prénom & Nom" name="Prenom_s_et_nom">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Adresse</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputAddresse" value="<?php echo $donne['ADRESSE'];?>" name="Adresse">
													<?php } else { ?> 
													<input type="text" class="form-control" id="inputAddresse" placeholder="Adresse" name="Adresse">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Ville</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputCity" value="<?php echo $donne['VILLE'];?>" name="Ville">
													<?php } else { ?> 
													<input type="text" class="form-control" id="inputCity" placeholder="Ville" name="Ville">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Code Postal</label>
													<?php if (isset($_GET['id'])){?>
													<input type="number" class="form-control" id="inputZip" value="<?php echo $donne['BP'];?>"  name="Bp">
													<?php } else { ?> 
													<input type="number" class="form-control" id="inputZip" placeholder="Code Postale" name="Bp">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Statut</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputZip" value="<?php echo $donne['STATUT'];?>"  name="Statut">
													<?php } else { ?> 
													<input type="text" class="form-control" id="inputZip" placeholder="Statut" name="Statut">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Mobile</label>
													<?php if (isset($_GET['id'])){?>
													<input type="tel" class="form-control" id="inputphone1" value="<?php echo $donne['MOBILE'];?>" name="Mobile">
													<?php } else { ?> 
													<input type="tel" class="form-control" id="inputphone1" placeholder="Téléphone Mobile" name="Mobile">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Fixe</label>
													<?php if (isset($_GET['id'])){?>
													<input type="tel" class="form-control" id="inputphone2" value="<?php echo $donne['FIXE'];?>" name="Fixe">
													<?php } else { ?> 
													<input type="tel" class="form-control" id="inputphone2" placeholder="Téléphone Fixe" name="Fixe">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Fax</label>
													<?php if (isset($_GET['id'])){?>
													<input type="tel" class="form-control" id="inputphone2" value="<?php echo $donne['BUREAU'];?>" name="Fax">
													<?php } else { ?> 
													<input type="tel" class="form-control" id="inputphone2" placeholder="Fax" name="Fax">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Mail</label>
													<?php if (isset($_GET['id'])){?>
													<input type="email" class="form-control" id="inputZip" value="<?php echo $donne['MAIL'];?>" name="Mail">
													<?php } else { ?>
													<input type="email" class="form-control" id="inputZip" placeholder="Mail" name="Mail">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Type contact</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputZip" value="<?php echo $donne['TYPECONTACT'];?>" name="Type">
													<?php } else { ?>
													<input type="text" class="form-control" id="inputZip" placeholder="Type contact" name="Type">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-3">
												  <div class="form-group">
													<label>ExonereTVA</label>
													<?php if (isset($_GET['id'])&&($donne['EXONERETVA']==1)){?>													 
													<input type="checkbox" class="form-control" value="<?php echo $donne['EXONERETVA'];?>" checked name="ExonereTVA">
													<?php } else { ?>
													<input type="checkbox" class="form-control" name="ExonereTVA">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-3">
												  <div class="form-group">
													<label>PrecompteTVA</label>
													<?php if (isset($_GET['id'])&&($donne['PRECOMPTETVA']==1)){?>	
													<input type="checkbox" class="form-control" value="<?php echo $donne['PRECOMPTETVA'];?>"  name="PrecompteTVA">
													<?php } else { ?>
													<input type="checkbox" class="form-control" name="PrecompteTVA">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Etat contact</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputAddresse"  value="<?php echo $donne['ETATCONT'];?>" name="Etat_contact">
													<?php } else { ?>
													<input type="text" class="form-control" id="inputAddresse" placeholder="Etat contact" name="Etat_contact">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Causes</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputAddresse" value="<?php echo $donne['CAUSES'];?>"name="Causes">
													<?php } else { ?>
													<input type="text" class="form-control" id="inputAddresse" placeholder="Causes" name="Causes">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
												  <div class="form-group">
													<label>Décisions</label>
													<?php if (isset($_GET['id'])){?>
													<input type="text" class="form-control" id="inputAddresse" value="<?php echo $donne['DECISIONS'];?>"name="Decisions">
													<?php } else { ?>
													<input type="text" class="form-control" id="inputAddresse" placeholder="Décisions" name="Decisions">
													<?php }?>
												  </div>
											  </div>
											  <div class="col-md-6">
											<div class="form-group">
												<label>Observations</label>
												<?php if (isset($_GET['id'])){?>
												<textarea class="form-control" value="<?php echo $donne['OBSERVATIONS'];?>" id="floatingTextarea2" style="height: 100px" name="Observations">
												<?php } else { ?>
												<textarea class="form-control" placeholder="Observations" id="floatingTextarea2" style="height: 100px" name="Observations">
												<?php }?>
												</textarea>
											</div>
										</div>   
										</div> 
											  <button  id="sort" name="modifclient" class="btn btn-info btn-sm">Modifier</button>
											  <button type="submit" id="sort" name="bt_client" class="btn btn-warning btn-sm">Ajouter</button>
											  <button  onclick="confirmer()" id="sort" name="dindi_client" class="btn btn-danger btn-sm">Supprimer</button>
										
									</div>
							</div>
						
					</form>      
                </div>
				</div>
				<div class="col-md-8 grid-margin stretch-card">
				<div class="card">
                  <div class="card-body">
            				<div class="template-demo mt-4"> 
                        <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
								<th></th>
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
								<th></th>
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
								<td> <a href="client.php?id=<?php echo $donnees['IDCONTACTS'];?>">Choisir </a></td> 
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
      </div>
          <!-- content-wrapper ends -->
<!-- Modal -->

<?php require '../footer.php'; ?>