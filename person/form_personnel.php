<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      
      <!-- partial -->

        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Formulaire du personnel </h3>
            
            </div>
            <div class="row">

              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Groupe Alpages</h4>
                    <form class="form-sample" action=ajoutPersonnel.php method="POST">
                      <p class="card-description">Gestion du personnel </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Prénom et nom</label>
                            <div class="col-sm-6">
                              <input type="text" name="prenomnom" class="form-control" placeholder="Prénom et Nom" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Matricule</label>
                            <div class="col-sm-6">
                              <input type="text" Name="matricule" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Sexe</label>
                            <div class="col-sm-6">
                              <select class="form-control">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Date de naissance</label>
                            <div class="col-sm-6">
                              <input class="form-control" name="datenaiss" placeholder="dd/mm/yyyy" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pays</label>
                            <div class="col-sm-6">
                              <input type="text" Name="pays" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nationalité</label>
                            <div class="col-sm-6">
                              <input type="text" Name="nationalite" class="form-control" />
                            </div>
                          </div>
                        </div>
                        </div>
              
					  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nom du père</label>
                            <div class="col-sm-6">
                              <input type="text" Name="nompere" class="form-control" />
                            </div>
                          </div>
                        </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nom de la Mère</label>
                            <div class="col-sm-6">
                              <input type="text" Name="nommere" class="form-control" />
                            </div>
                          </div>
                        </div>
						</div>
                     <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Groupe ethnique</label>
                            <div class="col-sm-6">
                              <input type="text" Name="groupethnik" class="form-control" />
                            </div>
                          </div>
                        </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Religion</label>
                            <div class="col-sm-6">
                              <input type="text" Name="religion" class="form-control" />
                            </div>
                          </div>
                        </div>
						</div>
						<div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tel. fixe</label>
                            <div class="col-sm-6">
                              <input type="text" Name="telfixe" class="form-control" />
                            </div>
                          </div>
                        </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tel. Portable</label>
                            <div class="col-sm-6">
                              <input type="text" Name="telportable" class="form-control" />
                            </div>
                          </div>
                        </div>
						</div>
						<div class="row">
                      <div class="col-md-6">
					  <div class="form-group">
                        <label for="exampleTextarea1">Adresse</label>
                        <textarea class="form-control" Name="adresse" id="exampleTextarea1" rows="4"></textarea>
                      </div>
                          
                        </div>
						</div>
						<div class="row">
						 <div class="col-md-3"></div>
						 <div class="col-md-3"></div>
						 <div class="col-md-3"><button class="btn btn-light">Cancel</button>	</div>
						 <div class="col-md-3"><button class="btn btn-gradient-primary mr-2" type="submit">Valider</button></div>
						</div>
                      
						
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
   
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>