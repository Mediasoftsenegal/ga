<? 
session_start();	 
require '../header.php'; 
include 'conf.php';	 
?>
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
                <div class="card-body">
                <div class="alert alert-danger" role="alert"><h2 class="card-title">Etape 1 : Choisir un client => cliquer sur l'icône dans la dernière colonne pour choisir un client </h2> </div>
                <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                              <th>code client</th>
                              <th>contact</th>
                              <th>Choisir</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th>code client<</th>
                              <th>contact</th>
                              <th>Choisir</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT * FROM clients");
                              while($donnees = $reponse->fetch()){
                                ?>
                               <tr>
                                <?$date=explode("-",$donnees['DATEACQUISITION'])?>
								                <td><?= $donnees['NUMCLIENT'] ?></td>
                                <td><?= $donnees['SOCIETE'] ?></td>
                                <td> <a href="offre_old.php?id=<?php echo $donnees['IDCONTACTS'];?>"><i class="mdi mdi-arrange-send-backward"></i> </a></td>
                              </tr>
                              <?php } $reponse->closeCursor(); ?>
                            </tbody>
                          </table>
                        </div>
                </div>
            </div>
</div>
<?php require '../footer.php'; ?>