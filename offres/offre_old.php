<?php session_start();	
require '../header.php'; 
include 'conf.php';	?>
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
        <div class="card">
				<?php 
                $i = 0;
                $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
            	$reponse = $db->query("SELECT * FROM  clients WHERE IDCONTACTS = ".$_GET['id']); $donnees = $reponse->fetch()?>
                <div class="card-body">
				<div class="alert alert-danger" role="alert"><h2 class="card-title">Etape 2 :  => Remplir Informations complémentaires => client : <?= $donnees['SOCIETE']?> </h2> </div>	
                
                              
                              <form name="diapfo" class="forms-sample" action="douguel.php"  onsubmit="return W3docs()" method="POST">
							<div class="row">
								<div class="col-md-6"> 
									<div class="form-group">
										<label>Date offre</label>
										<input type="date" class="form-control" id="inputnom" placeholder="Date acquisition" name="DATEACQUISITION">
									</div>
								</div> 	
								<div class="col-md-6"> 
									<div class="form-group">
										<label>Affaire</label>
										<textarea class="form-control" onkeyup="this.value = this.value.toUpperCase();" placeholder="Affaires" id="floatingTextarea2" rows="6" cols="50" name="AFFAIRE"></textarea>
									</div>
									
								</div> 
								<div class="col-md-6">
									<div class="form-group">											
										<label>Numéro offre</label>
										<input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip" placeholder="Numéro offre" name="NUMOFFRE">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label> Choisir un Client </label>
									<select name="IDCONTACTS" class="form-control">
                  <? //while($donnees = $reponse->fetch()){ ?>
										<option value="<?= $donnees['IDCONTACTS']?>"><?= $donnees['SOCIETE']?></option>
                              <?// } $reponse->closeCursor(); ?>
									</select>
									</div>
								</div>
								<div class="col-md-6">  
									<div class="form-group">
									<label>Montant offre</label>
									<input type="number" class="form-control" id="inputsociete" placeholder="Montant" name="MONTANT">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
									<label>Maître d'oeuvre</label>
									<input type="text" class="form-control" id="inputsociete" placeholder="Maître d'oeuvre" name="MAITREOEUVRE">
									</div>
								</div>  
								<div class="col-md-6">  
									<div class="form-group">
									<label>Montant Honoraire</label>
									<input type="number" class="form-control" id="inputCity" placeholder="Montant honoraire" name="MONTANTHONORAIRE">
									</div>
								</div> 
							</div> 
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
									<label>Autres infos</label>
									<input type="text" class="form-control" id="inputAddresse" placeholder="Autres infos" name="AUTRES_INFOS">
									</div>
								</div>
								<div class="col-md-6">   
									<div class="form-group">
									<label>Missions Proposées</label>
									<textarea class="form-control" placeholder="Missions Proposées" id="floatingTextarea2" style="height: 100px" name="MISSIONS"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group"> 
									<label>Affaire suivi par</label> 
									<select name="services" class="form-control">
									<?php $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 									
									$repons = $db->query("SELECT * FROM services");
									while($donnee = $repons->fetch()){?>
									<option value="<?= $donnee['nomservice']?>"><?= $donnee['nomservice']?></option>
									<?php } $repons->closeCursor(); ?>
									</select>
									</div> <!-- /.form-group -->
								</div>
								<div class="form-group">
										<label>Année</label>
										<input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip" placeholder="Année" name="ANNEE">
									</div>
							</div>
                      <br/> <button type="submit" id="sort" name="bt_offre" class="btn btn-warning btn-sm float-right">Ajouter</button>
                        </form>
</body>
<?php require 'footer.php'; ?>