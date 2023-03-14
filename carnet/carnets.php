<? session_start();
	require '../headers.php';
	include('conf.php');	 
 ?>
<? require_once("db_connect.php"); ?>
<? $id=$_GET['id'];
	$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
    $reponse = $db->query("SELECT offres.AFFAIRE,clients.SOCIETE,offres.IDOFFRES From affaires,offres,clients
	WHERE offres.IDOFFRES =affaires.IDOFFRES
	AND clients.IDCONTACTS = offres.IDCONTACTS
	AND affaires.IDAFFAIRES=".$id);
     while($donnees = $reponse->fetch()){
?>
    <!--div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <!-- partial >
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
       
        <!-- partial -->
        <div class="content-wrapper">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Carnet d'activité </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">				
                  <li class="breadcrumb-item"><a href="form_carnet.php"><h4>Retour</h4></a></li>
                </ol>
              </nav>
            </div>
			 <form name="diapfo" class="forms-sample" action="douguelcar.php"  method="GET">
				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body"> 
							<div class="alert alert-warning" role="alert"><h2 class="card-title">Etape 2 : Récapitulatif </h2> </div>   
							<div class="progress">
								<div class="progress-bar bg-gradient-success" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">75%</div>
							</div><br>	 
							
							<input  type="hidden" class="form-control" name="idoffresca" id="inlineFormInputGroupUsername2" value="<? echo $donnees['IDOFFRES'];?>">
							<? $idu=identifier($_SESSION["nom_afficher"]);?>							
							<label for="exampleTextarea1">Affaire</label>
							<textarea disabled class="form-control" id="exampleTextarea1" rows="4"><? echo utf8_encode($donnees['AFFAIRE']);?></textarea>    
							<div class="form-group"><br>		  
							<label for="exampleTextarea1">Client</label>
								<div class="input-group mb-2 mr-sm-2">
								<input disabled type="text" class="form-control" id="inlineFormInputGroupUsername2" value="<? echo utf8_decode($donnees['SOCIETE']);?>">
								</div>
							</div>
							<div class="row">             
								<div class="col-md-6">
								<input  name="id_user" type="hidden" class="form-control" id="inlineFormInputGroupUsername2" value="<? echo ($_SESSION["id_user"]);?>">
								<label for="exampleTextarea1">Employé</label>
								<? $reponse = $db->query("SELECT * FROM users WHERE  IDPERSONNEL=".$_SESSION["IDPERSONNEL"] ); ?>
								<?  $donneer = $reponse->fetch()?>
								<div class="input-group mb-2 mr-sm-2">			
								<input  type="hidden" class="form-control" name="idpersonnel" id="inlineFormInputGroupUsername2" value="<? echo $donneer['IDPERSONNEL'];?>">			
								<input disabled type="text" class="form-control" id="inlineFormInputGroupUsername2" value="<? echo utf8_decode($donneer['nom_afficher']);?>">
								</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<label>Date d'activité</label>
									<input type="date" name="date_contrat" class="form-control">
									</div>
								</div>
							</div>
							<div class="row"> 
								<div class="col-md-6">
								<label for="exampleTextarea1">Semaine</label>
									<div class="form-group">
									<input type="text" name="semaine" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<label for="exampleTextarea1">Temps passé extérieur</label>
									<div class="form-group">
										<input type="text" name="temps_exter" class="form-control">
									</div>
								</div>
							</div>	
							<div class="row"> 
								<div class="col-md-6">
								<label for="exampleTextarea1">Temps passé bureau</label>
									<div class="form-group">
										<input type="text" name="temps_bureau" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<label for="exampleTextarea1">Référence</label>
									<div class="form-group">
									<input type="text" name="reference" class="form-control">
									</div>
								</div>
			  
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="custom-control custom-checkbox">
									<input name="visaing" class="custom-control-input" type="checkbox" value="0" id="customCheckbox1">
									<label for="customCheckbox1" class="custom-control-label">Visa Ingénieur</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="custom-control custom-checkbox">
									<input name="visares" class="custom-control-input" type="checkbox"  value="0" id="customCheckbox2">
									<label for="customCheckbox2" class="custom-control-label">Visa Responsable</label>
									</div>
								</div>
							</div><br>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb breadcrumb-custom bg-inverse-infoé" >
									<li class="breadcrumb-item"><a href="#"></a></li>
									<li class="breadcrumb-item"><a href="#"></a></li>
									<li class="breadcrumb-item active" aria-current="page"><span><h4 class="card-title text-info">Transport</h4>  </span></li>
								</ol>
							</nav>	
						<div class="row"> 
							<div class="col-md-6">			 
							<label for="exampleFormControlSelect1">Moyen de transport</label>
							<select name="transport" class="form-control">
								<option value="">Choisir moyen de transport</option>
								<option value="Voiture">Voiture</option>
								<option value="Forfait">Forfait</option>
							 </select>
							</div>
							<div class="col-md-6">
								<label for="exampleTextarea1">Kilomètre transport</label>
								<div class="form-group">
									<input type="number" name="kmtransport" class="form-control">
								</div>
							</div>
						  <div class="col-md-6">
						  <label for="exampleFormControlSelect1">Justificatifs</label>
						  <textarea  class="form-control" name="justiftrans" id="exampleTextarea1" rows="4"></textarea>						  
						  </div>
						  <div class="col-md-6">
							<label for="exampleTextarea1">Nombre transport</label>
								<div class="form-group">
								<input type="number" name="nbretransport" class="form-control">
							</div>
						  </div>
						</div>	
						</div>
					</div>
				</div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body"> 
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-info">
							<li class="breadcrumb-item"><a href="#"></a></li>
							<li class="breadcrumb-item"><a href="#"></a></li>
							<li class="breadcrumb-item active" aria-current="page"><span><h4 class="card-title text-info">Perdièmes</h4>  </span></li>
						</ol>
					</nav>	
					<div class="row"> 
					<div class="col-md-6">	
						<div class="form-group">
						  <label for="exampleFormControlSelect1">Perdièmes</label>
						  <select name="perdiem" class="form-control">
								<option value="">Choisir le lieu</option>
								<option value="Afrique jour">Afrique jour</option>
								<option value="Hors Afrique jour">Hors Afrique jour</option>
						 </select>
						</div>
					<label for="exampleFormControlSelect1">Justificatifs</label>
					<textarea  class="form-control" name="justifperdiem" id="exampleTextarea1" rows="4"></textarea> 
					</div>
					<div class="col-md-6">	
						<label for="exampleTextarea1">Nombre</label>
						<div class="form-group">
						<input type="number" name="nbreperdiem" class="form-control">
						</div>
						<label for="exampleTextarea1">Dernier jour</label>
						<div class="form-group">
						<input type="text" name="dernierjour" class="form-control">
						</div>
					</div>
					</div><br>
                    <br>
					<nav aria-label="breadcrumb" role="navigation">
					<ol class="breadcrumb breadcrumb-custom bg-inverse-info">
						<li class="breadcrumb-item"><a href="#"></a></li>
						<li class="breadcrumb-item"><a href="#"></a></li>
						<li class="breadcrumb-item active" aria-current="page"><span><h4 class="card-title text-info">Frais divers/Factures</h4>  </span></li>
					</ol>
					</nav>	
					<div class="row"> 
						<div class="col-md-6">	
							<div class="form-group">
							  <label for="exampleFormControlSelect1">Frais divers</label>
							  <div class="form-group">
								<input type="text" name="fraisdivers" class="form-control">
								</div>
							</div>
							<label for="exampleFormControlSelect1">Justificatifs</label>
							<textarea  class="form-control" name="justifdivers" id="exampleTextarea1" rows="4"></textarea> 
						</div>
					<div class="col-md-6">	
						<label for="exampleTextarea1">Montant</label>
						<div class="form-group">
						<input type="text" name="mtfraisdivers" class="form-control">
						</div>
						<label for="exampleTextarea1">Avance</label>
						<div class="form-group">
						<input type="text" name="avances" class="form-control">
						</div>
					</div>
					</div>
					<br>
					<nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span><h4 class="card-title text-info">Repas et Hébergements</h4>  </span></li>
                </ol>
            </nav>	
					<div class="row"> 
					<div class="col-md-6">	
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Nombre de repas</label>
                      <div class="form-group">
						<input type="text" name="nbrepas" class="form-control">
						</div>
                    </div>
					<label for="exampleFormControlSelect1">Justificatifs</label>
					<textarea  class="form-control" name="justifrepas" id="exampleTextarea1" rows="4"></textarea> 
					</div>
					<div class="col-md-6">	
						<label for="exampleTextarea1">Nuité(s)</label>
						<div class="form-group">
						<input type="number" name="nbrenuite" class="form-control">
						</div>
						<label for="exampleFormControlSelect1">Justificatifs</label>
						<textarea  class="form-control" name="justifnuite" id="exampleTextarea1" rows="4"></textarea> 
						</div>
					</div>
					</div>
                  </div>
                </div>
              </div>
			  
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <button type="submit" value="bt_carnet" class="btn btn-gradient-info mb-2">Valider</button>
                  </div>
                </div>
              </div>
             </form> 
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
	 <? } require '../footer.php'; ?>
          <!-- partial -->
        </div> 
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
