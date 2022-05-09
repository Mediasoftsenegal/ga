<?php 
$id_client = $_GET['mo'];
$db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
$reponse = $db->query("SELECT * FROM clients WHERE IDCONTACTS = '$id_client'");
$donnees = $reponse->fetch();
?>
<?php require 'header.php'; ?>
    <div class="main-panel">
        <div class="content-wrapper">            
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modification des informations du client <?= $donnees['PRENOM_NOM']?></h4>
                    </div>
                    <div class="card-body">
                        <form action="douguel.php" method="post">
                        <input type="hidden" name="id" value="<?= $donnees['IDCONTACTS']?>">
                        <div class="row">
                            <div class="col-2">
                                <label>Numéro client</label>
                                <input name="numclient" type="text" class="form-control text-dark" value="<?= $donnees['NUMCLIENT']?>">
                            </div>
                            <div class="col-4">
                                <label>Prénom Nom</label>
                                <input name="prenom_nom" type="text" class="form-control text-dark" value="<?= $donnees['PRENOM_NOM']?>">
                            </div>
                            <div class="col-6">
                                <label>Adresse</label>
                                <input name="adresse" type="text" class="form-control text-dark" value="<?= $donnees['ADRESSE']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-4">
                                <label>Société</label>
                                <input name="societe" type="text" class="form-control text-dark" value="<?= $donnees['SOCIETE']?>">
                            </div>
                            <div class="col-4">
                                <label>Fixe</label>
                                <input name="fixe" type="text" class="form-control text-dark" value="<?= $donnees['FIXE']?>">
                            </div>
                            <div class="col-4">
                                <label>Mail</label>
                                <input name="mail" type="text" class="form-control text-dark" value="<?= $donnees['MAIL']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-4">
                                <label>Bureau</label>
                                <input name="bureau" type="text" class="form-control text-dark" value="<?= $donnees['BUREAU']?>">
                            </div>
                            <div class="col-4">
                                <label>Ville</label>
                                <input name="ville" type="text" class="form-control text-dark" value="<?= $donnees['VILLE']?>">
                            </div>
                            <div class="col-4">
                                <label>Boîte Postal</label>
                                <input name="bp" type="text" class="form-control text-dark" value="<?= $donnees['BP']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-4">
                                <label>Mobile</label>
                                <input name="mobile" type="text" class="form-control text-dark" value="<?= $donnees['MOBILE']?>">
                            </div>
                            <div class="col-4">
                                <label>Type Contact</label>
                                <input name="typecontact" type="text" class="form-control text-dark" value="<?= $donnees['TYPECONTACT']?>">
                            </div>
                            <div class="col-4">
                                <label>Statut</label>
                                <input name="statut" type="text" class="form-control text-dark" value="<?= $donnees['STATUT']?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-4">
                                <label>Causes</label>
                                <input name="causes" type="text" class="form-control text-dark" value="<?= $donnees['CAUSES']?>">
                            </div>
                            <div class="col-4">
                                <label>Décisions</label>
                                <input name="decisions" type="text" class="form-control text-dark" value="<?= $donnees['DECISIONS']?>">
                            </div>
                            <div class="col-2">
                                <label>Etat Contact</label>
                                <select class="form-control" name="etatcont">
                                    <option value="<?= $donnees['ETATCONT'] ?>"><?php if($donnees['ETATCONT']==1){echo 'ACTIF';}else{echo 'INACTIF';} ?></option>
                                    <option value="1">ACTIF</option>
                                    <option value="2">INACTIF</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label>ExonereTVA</label>
                                <input name="exoneretva" type="checkbox" <?php if($donnees['EXONERETVA']==1){?>checked<?php }else{?><?php }?>>
                                <label>PrecompteTVA</label>
                                <input name="precomptetva" type="checkbox" <?php if($donnees['PRECOMPTETVA']==1){?>checked<?php }else{?><?php }?>>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12">
                                <label>Observations</label>
                                <textarea name="observations" class="form-control" cols="30" rows="10"><?= $donnees['OBSERVATIONS']?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-inverse-info" onclick="history.back()">Retour</button>
                        <button class="btn btn-inverse-primary" name="modifcl">Valider</button>
                    </div>
                    </form>
                </div>		   
            </div>
        </div>
    </div>
</div>
</div>
          <!-- content-wrapper ends -->
<?php require 'footer.php'; ?>