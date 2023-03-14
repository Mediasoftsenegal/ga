<? require '../header.php'; ?>
<? require_once("db_connect.php"); ?>
<?php 
if (isset($_GET['id'])){
   $id_affaire=$_GET['id'];

    $repon = $db->query("SELECT *
	FROM commandes
	INNER JOIN offres ON commandes.IDOFFRES=offres.IDOFFRES
	INNER JOIN clients ON offres.IDCONTACTS=clients.IDCONTACTS
	WHERE commandes.IDCOMMANDES =$id_affaire");
    $donne = $repon->fetch();
}
?>

<!--div class="main-panel"-->

    <div class="content-wrapper">
        <div class="row" id="proBanner">
            <div class="col-12"></div>
		</div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-box-outline"></i>
                </span> Gestion administrative : Module des Affaires </h3> 
        </div>
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                      <h4 class="card-title">Détails Affaires</h4>
					  <div class="alert alert-info" role="alert"><h2 class="card-title">Etape 2 : Détails Affaires  </h2> </div>  
					  <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 1000%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                     </div><br>	 
                    <!--div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"-->
                         <form name="diapfo" class="forms-sample" action="douguel.php"  onsubmit="return W3docs()" method="POST">
						 <input type="hidden" name="IDCOMMANDES" value="<?= $_GET['id'] ?>">
						 <input type="hidden" name="IDOFFRES" value="<?= $donne['IDOFFRES'] ?>">
							<div class="row">
								<div class="col-md-6"> 
									<div class="form-group">
										<label>N° Commande</label>
										<input type="text" name="NUMCOMMANDE" class="form-control" value="<?= $donne['NUMCOMMANDE'];?>" readonly>
									</div>
									<div class="form-group">
										<label>Lieu</label>
										<input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip" placeholder="Lieu" name="LIEU">
									</div>
								</div> 
								<div class="col-md-6">
									<div class="form-group">
										<label>Année</label>
										<input type="text" style="text-transform: uppercase;" class="form-control" id="inputZip" placeholder="Année" name="ANAFF">
									</div>
									<div class="form-group">
										<label>Opérations</label>
										<textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="AFFAIRE" readonly><?= utf8_encode($donne['AFFAIRE'])?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Client </label>
										<input type="text" name="IDCONTACTS" class="form-control" value="<?= $donne['PRENOM_NOM'];?>" readonly>
									</div>
								</div>
								<div class="col-md-6">  
									<div class="form-group">
										<label>Etat d'avancement</label>
										<input type="text" class="form-control" id="etat" placeholder="Etat d'avancement" name="ETAT">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">  
									<div class="form-group">
										<label>Date début</label>
										<input type="date" class="form-control" id="date" placeholder="Date début" name="DATESIGNATURE">
									</div>
								</div>  
								<div class="col-md-6">  
									<div class="form-group">
										<label>Date fin prévisionnelle </label>
										<input type="date" class="form-control" id="datefinr" placeholder="Date réelle fin" name="DATEFIN">
									</div>
								</div> 
							</div> 
							<div class="row">
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
										<label>Observations</label>
										<textarea class="form-control" placeholder="Observations" id="floatingTextarea2" style="height: 100px" name="OBSERVATIONS"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group"> 
										<label>Intervenants</label> 
										<select name="services" class="form-control">
											<?php $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
											$repons = $db->query("SELECT * FROM services");
											while($donnee = $repons->fetch()){?>
											<option value="<?= $donnee['nomservice']?>"><?= $donnee['nomservice']?></option>
										<?php } $repons->closeCursor(); ?>
									</select>
									</div> <!-- /.form-group -->
								</div>
							</div>
                      <br/> 
                      <button type="submit" id="sort" name="valid_aff" class="btn btn-warning btn-sm">Valider</button>
                        </form>
                       
                    </div>
                   
                </div>
               </div>
        
        
        </div>
        </div>
    </div>  
    
 </div>
 <?php require '../footer.php'; ?>