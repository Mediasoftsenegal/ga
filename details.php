<?php 
$id_client = $_GET['det'];
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
$reponse = $db->query("SELECT * FROM clients WHERE id_cli = '$id_client'");
$donnees = $reponse->fetch();
?>
<?php require 'header.php'; ?>
    <div class="main-panel">
        <div class="content-wrapper">            
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informations du client <?= $donnees['Prenom_s_et_nom']?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <label>Numéro client</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['NumClient']?>">
                            </div>
                            <div class="col-4">
                                <label>Prénom Nom</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Civilite'].' '.$donnees['Prenom_s_et_nom']?>">
                            </div>
                            <div class="col-6">
                                <label>Adresse</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Adresse']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-4">
                                <label>Société</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Societe']?>">
                            </div>
                            <div class="col-4">
                                <label>Téléphone</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Fixe'].' / '.$donnees['Mobile']?>">
                            </div>
                            <div class="col-4">
                                <label>Mail</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Mail']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-4">
                                <label>Bureau</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Bureau']?>">
                            </div>
                            <div class="col-4">
                                <label>Ville</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Ville']?>">
                            </div>
                            <div class="col-4">
                                <label>Boîte Postal</label>
                                <input type="text" class="form-control text-dark" readonly value="<?= $donnees['Bp']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12">
                                <label>Observations</label>
                                <textarea class="form-control" cols="30" rows="10" readonly><?= $donnees['Observations']?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-inverse-info" onclick="history.back()">Retour</button>
                    </div>
                </div>		   
            </div>
        </div>
    </div>
</div>
</div>
          <!-- content-wrapper ends -->
<?php require 'footer.php'; ?>