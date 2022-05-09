<?php
require'../connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste des clients</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/alp.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#"><img src="../../assets/images/ga.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="../../assets/images/" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Recherche... ">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><? echo $nomuser;?></p>
                </div>
              </a>
              
                
            </li>
            
            <li class="nav-item dropdown">
             
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <div class="dropdown-divider"></div>
                <div class="dropdown-divider"></div>
                <div class="dropdown-divider"></div>
            </li>
            <li class="nav-item dropdown">
             
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1"></h6>
                    <p class="text-gray ellipsis mb-0"> </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1"></h6>
                    <p class="text-gray ellipsis mb-0"> </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Bureau de contrôle<br> Alpages</span>
                  <span class="text-secondary text-small">Gestion administrative</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Tableau de bord</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Contacts</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="clients.php">Clients</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Fournisseurs</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Offres</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Affaires</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Personnel</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Carnet d'activité</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des clients et recherches</h4>
            					<div class="col-10 grid-margin stretch-card">
            						<div class="card">
            						  <div class="card-body">
            							<form class="form-inline" method="POST" action="clients.php">
            							  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="prenomnom" placeholder="Prénom et nom">
            							  <div class="input-group mb-2 mr-sm-2">
            								<input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="societe" placeholder="Société">
            							  </div>
            							  <button type="submit" class="btn btn-gradient-primary mb-2">Recherche</button>
            							</form>
            						  </div>
            						  </div>
            						  <div class="template-demo mt-4">
            						  <button type="button" class="btn btn-gradient-danger btn-sm"  data-toggle="modal" data-target="#ajoutclient"> Nouveau client </button>                           
                            <!-- Modal -->
                            <div class="modal fade" id="ajoutclient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                    <div class="modal-content modal-content-scrollable">
                                  <div class="modal-body">
                                    <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="Code_Client" id="inputcodeclient" placeholder="Code client" aria-label="Code client">
                                      </div>
                                      <div class="col">    
                                      </div>
                                    </div>
                                    <form class="row g-6">
                                    <div class="col-md-4">
                                      <label for="inputsociete" class="form-label"></label>
                                      <input type="text" class="form-control" name="societe" id="inputsociete" placeholder="Société">
                                    </div>
                                    <div class="col-4">
                                      <label for="inputnom" class="form-label"></label>
                                      <input type="text" class="form-control" name="civitite" id="inputcivilite" placeholder="Civilite">
                                    </div>
                                    <div class="col-4">
                                      <label for="inputnom" class="form-label"></label>
                                      <input type="text" class="form-control" name="prenom_nom" id="inputnom" placeholder="Prénom & Nom">
                                    </div>
                                    <div class="col-12">
                                      <label for="inputAddresse" class="form-label"></label>
                                      <input type="text" class="form-control" name="adresse" id="inputAddresse" placeholder="Adresse">
                                    </div>
                                    <div class="col-6">
                                      <label for="inputStatut" class="form-label"></label>
                                      <input type="text" class="form-control" name="statut" id="inputStatut" placeholder="Statut">
                                    </div>
                                    <div class="col-6">
                                      <label for="inputmail" class="form-label"></label>
                                      <input type="email" class="form-control" name="mail" id="inputMail" placeholder="E mail">
                                    </div>
                                    <div class="col-4">
                                      <label for="inputtel" class="form-label"></label>
                                      <input type="tel" class="form-control" name="mobilePhone" id="inputmobilephone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="Mobile">
                                    </div>
                                      <div class="col-4">
                                      <label for="inputtel" class="form-label"></label>
                                      <input type="tel" class="form-control" name="fixePhone" id="inputfixephone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="Fixe">
                                    </div>
                                    <div class="col-4">
                                      <label for="inputtel" class="form-label"></label>
                                      <input type="tel" class="form-control" name="bureauPhone" id="inputbureauphone" pattern="[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="Bureau">
                                    </div> 
                                    <div class="col-md-6">
                                      <label for="inputZip" class="form-label"></label>
                                      <input type="number" class="form-control" name="code_postal" id="inputcodepostal" placeholder="Code Postal">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="inputVille" class="form-label"></label>
                                      <input type="text" class="form-control" name="ville" id="inputCity" placeholder="Ville">
                                    </div>
                                    <div class="col-12">
                                      <label for="inputobservations" class="form-label"></label>
                                      <input type="text" class="form-control" name="observations" id="inputobservations" placeholder="Observations">
                                    </div>
                                  </form>
                                  </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="button" name="enregistrerclient" class="btn btn-primary">Ajouter</button>
                                  </div>
                                </div>
                              </div>
                            </div>
        </div>
      </div>					
				<div style="overflow:scroll; border:#000000 1px solid;">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th "width=60%"> Code Client </th>
                          <th "width=60%"> Société </th>                          
                          <th "width=60%"> Prénom Nom </th>
						              <th "width=60%"> Adresse </th>
                          <th "width=60%"> Tel. </th>
                          <th "width=20%">  </th>
                          <th "width=20%">  </th>                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if (!empty($_POST['societe']) || !empty($_POST['prenomnom']))
							{
							$res=search_client($_POST['societe'],$_POST['prenomnom']);
							}
							else
							{
							$res=liste_clients();
							}
                          while($row=mysqli_fetch_array($res)){
                            echo "<tr>";
                            echo "<td class=text-lowercase>"; echo $row["NumClient"];  echo "</td>";
                            echo "<td class=>"; echo $row["Societe"];  echo "</td>";
                            echo "<td class=text-lowercase>"; echo $row["Prenom_s_et_nom"];  echo "</td>";
							echo "<td class=text-lowercase>"; echo $row["Adresse"].' /'.$row["Mobile"];  echo "</td>";
                            echo "<td class=text-lowercase>"; echo $row["Mobile"];  echo "</td>";
                            echo "<td class=text-lowercase>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"><i class="mdi mdi-account-convert"></i></a> <?php echo "</td>";
                            echo "<td width=20%>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>"><i class="mdi mdi-account-minus"></i></a> <?php echo "</td>";
                            echo "</tr>";
                          }
                          ?>
                      </tbody>
                    </table>
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          
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
    <!-- End custom js for this page -->
  </body>
  <?php
  if (isset($_POST["enregistrerclient"]))
  {
    mysqli_query($link,"INSERT INTO `clients` (`id_cli`, `NumClient`, `Societe`, `Civilite`, `Prenom_s_et_nom`, `Adresse`, `Statut`, `Mail`, `Mobile`, `Fixe`, `Bureau`, `Bp`, `Ville`, `Observations`) VALUES (NULL, '$_POST[Code_Client]', '$_POST[societe]', '$_POST[civitite]', '$_POST[prenom_nom]', '$_POST[adresse]', '$_POST[statut]', '$_POST[mail]', '$_POST[mobilePhone]', $_POST[fixePhone], $_POST[bureauPhone], '$_POST[code_postal]', '$_POST[ville]', '$_POST[observations]');");
  ?>
  <?php
  }
  ?>
</html>
