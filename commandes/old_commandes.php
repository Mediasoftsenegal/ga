<? require '../header.php'; ?>
<? require_once("db_connect.php");?>
<!--div class="main-panel"-->
    <!--div class="main-panel"-->
    <div class="content-wrapper">
        <div class="row" id="proBanner">
            <div class="col-12"></div>
		</div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white mr-2">
                    <i class="mdi mdi-account-box-outline"></i>
                </span> 
                Gestion administrative : Module des commandes 
            </h3>
        </div>
        <? $id = $_GET['id'];
        $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
        $reponse = $db->query("SELECT * FROM offres
        INNER JOIN clients ON  offres.IDCONTACTS = clients.IDCONTACTS 
        WHERE IDOFFRES = $id"); ?>
        <div class="card">
			<div class="card-body">
                <h4 class="card-title"></h4>
                <div class="alert alert-info" role="alert"><h2 class="card-title">Etape 2 : Saisir informations complémentaires  </h2> </div>   
                <form name="diapfo" class="forms-sample" action="douguele.php" method="POST"> 
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label>N° Commande</label>
								<input type="text" class="form-control" id="inputnom" placeholder="N° Commande" name="NUMCOMMANDE"> 
							</div>
							<? while($donnees = $reponse->fetch()){ ?>
							<div class="form-group">
								<label>Affaire</label>
								<input type="text" name="AFFAIRES" id="AFFAIRES" class="form-control" value="<?php echo utf8_encode($donnees['AFFAIRE']);?>" readonly>
								<input type="hidden" name="IDOFFRES" id="IDOFFRES" class="form-control" value="<?php echo utf8_encode($donnees['IDOFFRES']);?>" readonly>
							</div>
							<div class="form-group">
								<label>Numéro Offre</label>
								<input type="text" style="text-transform: uppercase;" class="form-control"  id="NUMOFFRE" value="<?php echo $donnees['NUMOFFRE'];?>"  name="NUMOFFRE" disabled >
							</div>
							<div class="form-group">
								<label>Missions Proposées</label>
								<textarea class="form-control" id="floatingTextarea2" style="height: 100px" id="MISSIONS" name="MISSIONS" disabled ><?= $donnees['MISSIONS']?> </textarea>
							</div>
							<div class="form-group">
								<label>Code client</label>
								<input type="number" class="form-control" id="NUMCLIENT" value="<?= $donnees['NUMCLIENT']?>" name="NUMCLIENT" disabled>
							</div> 
							<div class="form-group">
								<label>Nom Client</label>
								<input type="text" class="form-control" id="SOCIETE" value="<?= $donnees['SOCIETE']?>" name="SOCIETE" disabled>
							</div>  
							<div class="form-group">
								<label>Montant Honoraire</label>
								<input type="number" class="form-control" id="MONTANTHONORAIRE" value="<?= $donnees['MONTANTHONORAIRE']?>" name="MONTANTHONORAIRE" disabled>
							</div>
							<? } $reponse->closeCursor(); ?>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Numéro affaire</label>
								<input type="text" class="form-control" id="inputAddresse"  name="NUMAFFAIRE">
							</div>  
							<div class="form-group">
								<label>Durée</label>
								<input type="text" style="text-transform: uppercase;" class="form-control" name="DUREE">
							</div>
							<div class="form-group">
								<label>Date commande</label>										
								<input type="date" class="form-control" id="inputnom" name="DATECOMMANDE">
							</div>
							<div class="form-group">
								<label>Date 1ère visite</label>
								<input type="date" class="form-control" id="inputnom" name="DATEDEMARRAGE">
							</div>
							<div class="form-group">
								<label class="col-sm-3 col-form-label">Taxes</label>
								<div class="form-check form-check-primary">
									<label class="form-check-label">
										<input type="checkbox" name="EXONERETVA" class="form-check-input" > Exonérée TVA <i class="input-helper"></i>
									</label>
								</div>
								<div class="form-check form-check-danger">
									<label class="form-check-label">
										<input type="checkbox" name="PRECOMPTETVA" class="form-check-input" > Précompte TVA <i class="input-helper"></i>
									</label>
								</div>
							</div>
							<div class="form-group">
								<label>Types d'intervention</label>
								<textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="TYPEINTERVENTION"></textarea>
							</div>
							<div class="form-group">
								<div class="form-check form-check-danger">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input" >Facturée à la même adresse <i class="input-helper"></i></label> 
								</div> 
							</div> 	
							<div class="form-group">
								<label>Adresse de facturation</label>
								<textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="ADRESSEFACTURATION"></textarea>
							</div>
						</div>
					</div>
            </div>
			<div class="card-footer">
                    <button id="sort" name="modif_come" class="btn btn-warning btn-sm">Valider</button>              
                </form>
			</div>
        </div>
    </div>
<? require '../footer.php'; ?>