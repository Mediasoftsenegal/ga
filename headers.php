<?
require 'db_class.php';

$DB = new DB();

session_start();

if ($_SESSION["connecter"] == "Oui") {
  
} else {
  header('location:../login.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <!-- plugins:css -->
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="../awesome/css/all.css" rel="stylesheet">
    <link href="../awesome/css/fontawesome.css" rel="stylesheet">
    <link href="../awesome/css/brands.css" rel="stylesheet">
    <link href="../awesome/css/solid.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/alp.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#"><img src="../assets/images/ga.png" alt="logo" /><br><h5>Bureau de contrôle Alpages</h5> </a> 
               </div>
          
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
         
          <div class="search-field d-none d-md-block">
                <div class="nav-profile-text d-flex flex-column">
                  
                  
                </div>        
          </div>
		  
          <ul class="navbar-nav navbar-nav-center">
		  
			<li class="nav-item d-none d-sm-inline-block">
                <a href="../tabbord01.php" class="nav-link">Accueil</a>
            </li>
			
			<li class="nav-item d-none d-sm-inline-block">
                <a href="../clients/client.php" class="nav-link">Clients</a>
            </li>
			<li class="nav-item d-none d-sm-inline-block">
          <div class="card card-inverse-danger" id="context-menu-multi">
                <a href="../offres/offres.php" class="nav-link">Offres</a>
          </div>      
            </li>
			<li class="nav-item d-none d-sm-inline-block">
          <div class="card card-inverse-info" id="context-menu-multi">
                <a href="../commandes/commandes.php" class="nav-link">Commandes</a>
          </div>       
            </li>
			<li class="nav-item d-none d-sm-inline-block">
         <div class="card card-inverse-success" id="context-menu-multi">
                <a href="../affaires/affaires.php" class="nav-link">Affaires</a>
         </div>        
        </li>
			
			<li class="nav-item d-none d-sm-inline-block">
          <div class="card card-inverse-warning" id="context-menu-multi">
                <a href="../carnet/carnet01.php" class="nav-link">Carnet d'activité</a>
          </div> 
            </li>
			
			<li class="nav-item d-none d-sm-inline-block">
                <a href="../deconnexion.php" class="nav-link">Déconnexion</a>
            </li>
			<li class="nav-item d-none d-sm-inline-block">
			<?
			//echo 'Nom :'.$_SESSION["nom_afficher"];
			//	echo 'Profil :'.$_SESSION["Profileur"] ;
			?>	
			</li>			
          <div class="template-demo">
			
           
             
          </div> 
              <!--a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false"-->
              <div class="nav-profile-text">                 
                  <p class="mb-1 text-black"><? echo 'Utilisateur :  '.$_SESSION["nom_afficher"].'-'.$_SESSION["IDPERSONNEL"]?></p>
                </div>
				
            <!--/a-->
          </ul>
        </div>
      </nav>
      
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
    
           
            
            