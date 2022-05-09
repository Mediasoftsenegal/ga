<?php 
require '../header0.php'; 
if (isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
    $id_user=$_GET['id'];
    $repon = $db->query("SELECT * FROM users WHERE id_user='$id_user'");
    $donne = $repon->fetch();
}
?>
<!--div class="main-panel"-->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row" id="proBanner">
            <div class="col-12">
              
            </div>
        </div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-box-outline"></i>
                </span> Gestion des utilisateurs </h3>     
        </div>

    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                      <h4 class="card-title">Détails utilisateur</h4>
                    <!--div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"-->
                         <form name="diapou" class="forms-sample" action="doli.php"  onsubmit="return W3docs()" method="POST">
                         <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Prénom & Nom</label>
                        <div class="col-sm-9">
                        <?php if (isset($_GET['id'])){?>
                          <input type="hidden" name="id_user" class="form-control" id="exampleInputMobile" value="<? echo $donne['id_user'];?>">
                          <br/>
                          <input type="text" name="nom_afficher" id="nom_afficher" class="form-control" id="exampleInputMobile" value="<? echo $donne['nom_afficher'];?>">
                          <?php } else { ?>
                            <input type="text" name="nom_afficher" id="nom_afficher" class="form-control" id="exampleInputMobile" placeholder="Prénom & Nom" required>
                            <?php }?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Login</label>
                        <div class="col-sm-9">
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="login" id="login" class="form-control" id="exampleInputMobile" value="<? echo $donne['login'];?>">
                          <?php } else { ?>
                          <input type="text" name="login" id="login" class="form-control" id="exampleInputMobile" placeholder="Login" required>
                          <?php }?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mot de passe</label>
                        <div class="col-sm-9">
                        <?php if (isset($_GET['id'])){?>
                          <input type="password" name="password" class="form-control" id="exampleInputMobile" value="<? echo $donne['password'];?>">
                          <?php } else { ?>
                          <input type="password" name="password" id="password" class="form-control" id="exampleInputMobile" placeholder="mot de passe" required>
                          <?php }?> 
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Profil</label>
                        <div class="col-sm-9">
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="profil" class="form-control" id="exampleInputMobile" value="<? echo $donne['profil'];?>">
                          <?php } else { ?>
                          <input type="text" name="profil" class="form-control" id="exampleInputMobile" placeholder="Profil" required>
                          <?php }?>
                        </div>
                      </div>
                      <button  id="sort" name="sopi" class="btn btn-info btn-sm">Modifier</button>
                      <button type="submit" id="sort" name="yonde" class="btn btn-warning btn-sm">Valider</button>
                      <button  onclick="confirmer()" id="sort" name="dindi" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                        <script>
                          var login = document.forms["diapou"]["login"];
                          var password =document.forms["diapou"]["password"];

                          if(login.value==""){
                            alert("saisissez votre votre login!");
                            login.focus();
                            return false;
                          }
                          if(password.value==""){
                            alert("saisissez votre mot de passe ! ");
                            password.focus();
                            return false;
                          }
                          if(login.value.indexOf("@groupe-alpages.com",0)<0){
                            alert("Saissez votre adresse professionnelle");
                            login.focus();
                            return false;
                    
                          }
                        </script>
                    </div>
                   
                </div>
               </div>
        
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">listes des utilisateurs</h4>
               
                <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th></th>
                                <th> Prénom & Nom</th>
								<th> Login</th>
								<th> Mot de passe</th>
                                <th> Profil</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th>  </th>    
                              <th> Prénom & Nom</th>
								<th> Login</th>
								<th> Mot de passe</th>
                                <th> Profil</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT * FROM users
						                  ORDER BY nom_afficher ASC");
                              while($donnees = $reponse->fetch()){
                                ?>
                              <tr>
                                 <th> <a href="user.php?id=<?php echo $donnees['id_user'];?>">Choisir </a></th> 
								                 <td><?php echo htmlspecialchars($donnees['nom_afficher']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['login']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['password']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['profil']); ?></td>
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
     <script> 
        function confirmer(){
          var res = confirm("Ëtes-vous sûr de vouloir supprimer?");
          if (res){

          }
        }
     </script>
 </div