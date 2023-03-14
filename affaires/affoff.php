<? require '../header.php';

 include('conf.php'); ?>

<? require_once("db_connect.php"); ?>

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

        <div class="card">

					<div class="card-body">
                      <div class="alert alert-info" role="alert"><h2 class="card-title">Etape 1 : Choisir une commande  => cliquer sur l'icône dans la dernière colonne pour choisir une commande  </h2> </div>   
                      <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
                     </div><br>	
                      <? $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');

                      $reponse = $db->query("SELECT * FROM commandes INNER JOIN offres ON commandes.IDOFFRES=offres.IDOFFRES 
                      ORDER BY idcommandes desc"); ?>

                      <div class="table-responsive"> 

                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">

                            <thead>

                            <tr>

                              <th>N° Commande</th>

                              <th>Opérations</th>

                              <th>Choix</th> 

                              </tr>

                            </thead>

                            <tfoot>

                              <tr>

                              <th>N° Commande</th>

                              <th>Opérations</th>

                              <th>Choix</th>

                              </tr>

                            </tfoot>

                            <tbody>

                              <? while($donnees = $reponse->fetch()){

                                ?>

                               <tr>							

                                 <td> <?= $donnees['NUMCOMMANDE'] ?> </td>

                                 <td> <?= utf8_encode($donnees['AFFAIRE']) ?> </td>

								 <td align="center"> <a href="affaires_old.php?id=<?php echo $donnees['IDCOMMANDES'];?>"><i class="mdi mdi-arrange-send-backward"></i></a></td>

                              </tr>

                              <? } $reponse->closeCursor(); ?>

                            </tbody>

                          </table>

                        </div>

<?php require '../footer.php'; ?>