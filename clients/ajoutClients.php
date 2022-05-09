<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/alp.png">
                </div>
                <h4>Formulaire d'ajout d'un client</h4>
                <h6 class="font-weight-light"> Remplisser le formulaire pour ajouter un nouveau client </h6>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" id="codeClient" placeholder="Code client">
                  </div>
                  <div class="form-group">
                    <input type="text-left" class="form-control form-control-lg" id="Societe" placeholder="Société">
                  </div>
                  <div class="form-group">
                    <input type="text-left" class="form-control form-control-lg" id="nom" placeholder="Prénom & Nom">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" id="numTel" placeholder="Téléphone">
                  </div>
                  <div class="form-group">
                    <select type="text-left" class="form-control form-control-lg" id="exampleFormControlSelect2">
                      <option>Pays</option>
                      <option>Sénégal</option>
                      <option>Guinée Bissau</option>
                      <option>Guinée Conakry</option>
                      <option>Mauritanie</option>
                      <option>Mali</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.html" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
