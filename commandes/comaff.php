<? require '../header.php'; ?>

<? require_once("db_connect.php");?>

<!--div class="main-panel"-->

    <div class="content-wrapper">

        <div class="row" id="proBanner">

            <div class="col-12"></div>

		</div>

        <div class="page-header">

            <h3 class="page-title">

                <span class="page-title-icon bg-gradient-info text-white mr-2">

                    <i class="mdi mdi-account-box-outline"></i>

                </span> 

                Gestion administrative : Module des commandes 

            </h3>     

        </div>

		<div class="row">

            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Listes des commandes </h4>
                        <div class="alert alert-info" role="alert"><h2 class="card-title">Etape 1 : Choisir une offre  => cliquer sur l'icône dans la dernière colonne pour choisir une offre  </h2> </div>   
                        <div class="table-responsive"> 

                            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">

                                <thead>

                                    <tr>
                                        <th>Affaire</th>  

                                        <th>Choisir</th>  

                                        </tr>

                                </thead>

                                <tfoot>

                                    <tr>

                                        <th>Affaire</th>

                                        <th>Choisir</th> 

                                    </tr>

                                </tfoot>

                                <tbody>

                                <? 

                                $i = 0;

                                $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');

                                $reponse = $db->query("SELECT * FROM offres");

                                while($donnees = $reponse->fetch()){

                                    ?>

                                    <tr>

                                        <td width=1%><?=utf8_encode($donnees['AFFAIRE'])?>&nbsp; =><?=($donnees['NUMOFFRE'])?></td> 

                                        <td align="center"><a href="old_commandes.php?id=<?php echo $donnees['IDOFFRES'];?>"><i class="mdi mdi-arrange-send-backward"></i></a></td> 

                                    </tr>

                                <? } $reponse->closeCursor(); ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<? require '../footer.php'; ?>