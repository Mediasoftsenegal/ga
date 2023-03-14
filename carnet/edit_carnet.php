<? 
session_start();	
require '../headers.php';
include('conf.php');	
 ?>
<?
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
if (isset($_GET['id'])){
   
    $repon = $db->query("SELECT * FROM perso WHERE id_personnel=".$_SESSION["IDPERSONNEL"]);
	$donne = $repon->fetch();
}
?>
<link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
<!--div class="main-panel"-->
<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-12"></div>
	</div>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-box-outline"></i>
            </span> Gestion administrative : Choisir un membre du personnel </h3>     
    </div>
	<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
			<h3 class="page-title"> Etape 1 </h3>
                <div class="progress">
                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><br>	
				<form method="POST"  action="visiocarnet.php" >
				<h4 class="card-title">Récapitulatif </h4>
				<input  type="hidden" class="form-control" name="idpersonnel" id="inlineFormInputGroupUsername2" value="<? echo $_SESSION["IDPERSONNEL"];?>">
				<div class="row">    
				<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
					<div class="form-group row">
						<div class="col">
							<label for="exampleFormControlSelect1">Année</label>
							<select name="Annee" class="form-control form-control-lg" id="exampleFormControlSelect1">
							<option value="2030">2030</option>
							<option value="2029">2029</option>
							<option value="2028">2028</option>
							<option value="2027">2027</option>
							<option value="2026">2026</option>
							<option value="2025">2025</option>
							<option value="2024">2024</option>
							<option value="2023">2023</option>
							<option value="2022">2022</option>
							<option value="2021">2021</option>
							<option value="2020">2020</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							 </select>
						</div>
					<div class="col">
							<label for="exampleFormControlSelect3">Mois</label>
							<select name="mois" class="form-control form-control-sm" id="exampleFormControlSelect3">
							<option value="01">Janvier</option>
							<option value="02">Février</option>
							<option value="03">Mars</option>
							<option value="04">Avril</option>
							<option value="05">Mai</option>
							<option value="06">Juin</option>
							<option value="07">Juillet</option>
							<option value="08">Août</option>
							<option value="09">Septembre</option>
							<option value="10">Octobre</option>
							<option value="11">Novembre</option>
							<option value="12">Décembre</option>
							</select>
					</div>
					</div>
				</div>
                </div>
			<div class="form-group">
				<div class="col">
					<label for="exampleTextarea1">Ingénieur</label>
					<div class="input-group mb-2 mr-sm-2">
					<input disabled type="text" name="nom" class="form-control" id="inlineFormInputGroupUsername2" value="<? echo $_SESSION["nom_afficher"]?>">
					</div>
				</div>
			</div>	
			
			<div class="card-body">
                    <h4 class="card-title">Without Thumbnails</h4>
                    <div id="lightgallery-without-thumb" class="row lightGallery">
                      <a href="../assets/images/carousel/banner_1.jpg" class="image-tile"><img src="../assets/images/carousel/banner_1.jpg" alt="image small" style="width: 275px;"></a>
                      <a href="../assets/images/carousel/banner_2.jpg" class="image-tile"><img src="../assets/images/carousel/banner_2.jpg" alt="image small" style="width: 275px;"></a>
                      <a href="../assets/images/carousel/banner_3.jpg" class="image-tile"><img src="../assets/images/carousel/banner_3.jpg" alt="image small" style="width: 275px;"></a>
                      <a href="../assets/images/carousel/banner_4.jpg" class="image-tile"><img src="../assets/images/carousel/banner_3.jpg" alt="image small" style="width: 275px;"></a>
                    </div>
                  </div>
			</div>
                <div class="card">
                  <div class="card-body">
                      <button type="submit" class="btn btn-gradient-info mb-2">Valider</button>
                  </div>
                </div>
			</form>
        </div>
        </div>
        </div>
    </div>  
	 <script src="../assets/jsowl.carousel.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 </div>
 <?php require '../footer.php'; ?>