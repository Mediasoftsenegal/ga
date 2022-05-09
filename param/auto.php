<?php 
require '../header0.php'; 
if (isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
    $id_vehucules=$_GET['id'];
    $repon = $db->query("SELECT * FROM vehicules 
    INNER JOIN perso
    WHERE vehicules.IDPERSONNEL=perso.IDPERSONNEL
    AND vehicules.id_vehucules='$id_vehucules'");
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
                </span> Gestion du parc automobile </h3>     
        </div>

    <div class="row">
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                      <h4 class="card-title">Détails véhicule</h4>
                    <!--div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"-->
                         <form name="diapau" class="forms-sample" action="doli.php"  onsubmit="return W3docs()" method="POST">
                         <div class="form-row">
                          <div class="col">
                          Nom du véhicule
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Nom_vehicule" id="Nom_vehicule" class="form-control" id="exampleInputMobile" value="<? echo $donne['Nom_vehicule'];?>">
                          <?php } else { ?>
                          <input type="text" name="Nom_vehicule" id="Nom_vehicule" class="form-control" id="exampleInputMobile" placeholder="Nom véhicule" required>
                          <?php }?>
                         
                         </div>
                        <div class="col">
                        Couleur
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="couleur" id="couleur" class="form-control" id="exampleInputMobile" value="<? echo $donne['couleur'];?>">
                          <?php } else { ?>
                          <input type="text" name="couleur" id="couleur" class="form-control" id="exampleInputMobile" placeholder="couleur" required>
                          <?php }?>
                        </div>
                      </div>
                      <br/>  
                      <div class="form-row">
                          <div class="col">
                          Véhicule attribué à
                          <select name="IDPERSONNEL" class="form-control" id="cars" required>
                            <?php 
					                   $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
					                  $repons = $db->query("SELECT * FROM perso where MEMBRE=1 AND PROFESSION like 'INGENIEUR'
                            OR PROFESSION like 'RECOUVREMENT' OR PROFESSION like 'JURISTE' OR PROFESSION like 'COMPTABLE' OR PROFESSION like 'TECHNICIEN'");
                             echo '<option value="">Véhicule attribué à</option>';
                            while($donnee = $repons->fetch()){?>
                           <option value="<?= $donnee['IDPERSONNEL']?>"><?= $donnee['PRENOMNOM']?></option>
                             <?php } $repons->closeCursor();?>
                            </select>
                         
                         </div>
                        <div class="col">
                        numéro immatriculation
                        <?php if (isset($_GET['id'])){?>          
                          <input type="text" name="num_immat" id="num_immat" class="form-control" id="exampleInputMobile" value="<? echo $donne['num_immat'];?>">
                          <?php } else { ?>
                          <input type="text" name="num_immat" id="num_immat" class="form-control" id="exampleInputMobile" placeholder="numéro immatriculation" required>
                          <?php }?>
                        </div>
                      </div>
                      <br/> 
                      <div class="row">
                      <div class="col">
                      Date immatriculation
                      <?php if (isset($_GET['id'])){?>                       
                      <input type="date" class="form-control" id="email" placeholder="Date immatriculation" name="Date_immat">
                      <?php } else { ?>
                        <input type="date" class="form-control" id="email" placeholder="Date immatriculation" name="Date_immat">
                      <?php }?> 
                      </div>
                      <div class="col">
                      Numéro titulaire
                      <?php if (isset($_GET['id'])){?>
                      <input type="text" class="form-control" placeholder="Numéro titulaire" name="Num_titulaire">
                      <?php } else { ?>
                        <input type="text" class="form-control" placeholder="Numéro titulaire" name="Num_titulaire">
                        <?php }?> 
                      </div>
                      </div>
                      <br/>
                      <div class="form-row">
                          <div class="col">
                          Prénom & Nom du Titulaire
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Prenomnom_titulaire" id="Prenomnom_titulaire" class="form-control" id="exampleInputMobile" value="<? echo $donne['Prenomnom_titulaire'];?>">
                          <?php } else { ?>
                          <input type="text" name="Prenomnom_titulaire" id="Prenomnom_titulaire" class="form-control" id="exampleInputMobile" placeholder="Prénom & Nom du Titulaire" required>
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          Adresse
                        <?php if (isset($_GET['id'])){?>
                          <textarea id="w3review" name="adresse" class="form-control"  ><? echo $donne['adresse'];?></textarea>
                          <?php } else { ?>
                            <textarea id="w3review" name="adresse" placeholder="Adresse" class="form-control" ></textarea>
                          <?php }?>
                        </div>
                      </div>
                      <br/>
                      <div class="form-row">
                          <div class="col">
                            Région
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="region" id="region" class="form-control" id="exampleInputMobile" value="<? echo $donne['region'];?>">
                          <?php } else { ?>
                          <input type="text" name="region" id="region" class="form-control" id="exampleInputMobile" placeholder="Région" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          Département
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="departement" id="departement" class="form-control" id="exampleInputMobile" value="<? echo $donne['departement'];?>">
                          <?php } else { ?>
                          <input type="text" name="departement" id="departement" class="form-control" id="exampleInputMobile" placeholder="Département" >
                          <?php }?>
                        </div>
                      </div>
                      <br/>
                      <div class="form-row">
                          <div class="col">
                          Commune
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Commune" id="Commune" class="form-control" id="exampleInputMobile" value="<? echo $donne['Commune'];?>">
                          <?php } else { ?>
                          <input type="text" name="Commune" id="Commune" class="form-control" id="exampleInputMobile" placeholder="Commune" >
                          <?php }?>
                         </div>
                        <div class="col">
                          Origine CMC
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="origine_cmc" id="origine_cmc" class="form-control" id="exampleInputMobile" value="<? echo $donne['origine_cmc'];?>">
                          <?php } else { ?>
                          <input type="text" name="origine_cmc" id="origine_cmc" class="form-control" id="exampleInputMobile" placeholder="Origine CMC" >
                          <?php }?>
                        </div>
                      </div>
                      <br/>
                      <div class="form-row">
                          <div class="col">
                          Numéro CMC
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="num_cmc" id="num_cmc" class="form-control" id="exampleInputMobile" value="<? echo $donne['num_cmc'];?>">
                          <?php } else { ?>
                          <input type="text" name="num_cmc" id="num_cmc" class="form-control" id="exampleInputMobile" placeholder="Numéro CMC" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          Date CMC
                        <?php if (isset($_GET['id'])){?>
                          <input placeholder="Date CMC" name="date_cmc"  type="text" id="date_cmc"  onfocus="(this.type='date')" class="form-control" value="<? echo $donne['date_cmc'];?>">
                          <?php } else { ?>
                          <input placeholder="Date CMC"  name="date_cmc" id="date_cmc" onfocus="(this.type='date')" class="form-control"  placeholder="Date CMC" >
                          <?php }?>
                        </div>
                      </div>     
                      <br/>
                      <div class="form-row">
                          <div class="col">
                          Date 1ère mise en circulation 
                          <?php if (isset($_GET['id'])){?>
                          <input placeholder="Date 1ère mise en circulation" type="text" name="Date_1eremc" id="Date_1eremc"onfocus="(this.type='date')" class="form-control" id="exampleInputMobile" value="<? echo $donne['Date_1eremc'];?>">
                          <?php } else { ?>
                          <input placeholder="Date 1ère mise en circulation" type="text" name="Date_1eremc" id="Date_1eremc" onfocus="(this.type='date')" class="form-control" id="exampleInputMobile" placeholder="Date de 1ère mise en circulation" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          Immatriculation précédente
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Precedente_imm" id="Precedente_imm" class="form-control" id="exampleInputMobile" value="<? echo $donne['Precedente_imm'];?>">
                          <?php } else { ?>
                          <input type="text" name="Precedente_imm" id="Precedente_imm" class="form-control" id="exampleInputMobile" placeholder="Précédente immatriculation" >
                          <?php }?>
                        </div>
                      </div>          
                      <br/>
                      <div class="form-row">
                          <div class="col">
                            Genre
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="genre" id="genre" class="form-control" id="exampleInputMobile" value="<? echo $donne['genre'];?>">
                          <?php } else { ?>
                          <input type="text" name="genre" id="genre" class="form-control" id="exampleInputMobile" placeholder="Genre" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          Marque
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="marque" id="marque" class="form-control" id="exampleInputMobile" value="<? echo $donne['marque'];?>">
                          <?php } else { ?>
                          <input type="text" name="marque" id="marque" class="form-control" id="exampleInputMobile" placeholder="marque" >
                          <?php }?>
                        </div>
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                            Carosserie
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Carosserie" id="Carosserie" class="form-control" id="exampleInputMobile" value="<? echo $donne['Carosserie'];?>">
                          <?php } else { ?>
                          <input type="text" name="Carosserie" id="Carosserie" class="form-control" id="exampleInputMobile" placeholder="Carosserie" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          Type 
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="type_veh" id="type_veh" class="form-control" id="exampleInputMobile" value="<? echo $donne['type_veh'];?>">
                          <?php } else { ?>
                          <input type="text" name="type_veh" id="type_veh" class="form-control" id="exampleInputMobile" placeholder="Type de véhicule" >
                          <?php }?>
                        </div> 
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                            Numéro série
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="num_serie" id="num_serie" class="form-control" id="exampleInputMobile" value="<? echo $donne['num_serie'];?>">
                          <?php } else { ?>
                          <input type="text" name="num_serie" id="num_serie" class="form-control" id="exampleInputMobile" placeholder="Numéro série" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          Energie
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="energie" id="energie" class="form-control" id="exampleInputMobile" value="<? echo $donne['energie'];?>">
                          <?php } else { ?>
                          <input type="text" name="energie" id="energie" class="form-control" id="exampleInputMobile" placeholder="Energie" >
                          <?php }?>
                        </div> 
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                            Puissance
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="puissance" id="puissance" class="form-control" id="exampleInputMobile" value="<? echo $donne['puissance'];?>">
                          <?php } else { ?>
                          <input type="text" name="puissance" id="puissance" class="form-control" id="exampleInputMobile" placeholder="Puissance" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          Cylindrée
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Cylindree" id="Cylindree" class="form-control" id="exampleInputMobile" value="<? echo $donne['Cylindree'];?>">
                          <?php } else { ?>
                          <input type="text" name="Cylindree" id="Cylindree" class="form-control" id="exampleInputMobile" placeholder="Cylindrée" >
                          <?php }?>
                        </div> 
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                            Nombre de places assises
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="placesassises" id="placesassises" class="form-control" id="exampleInputMobile" value="<? echo $donne['placesassises'];?>">
                          <?php } else { ?>
                          <input type="text" name="placesassises" id="placesassises" class="form-control" id="exampleInputMobile" placeholder="Nombre de place assise" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                        PTRA
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="PTRA" id="PTRA" class="form-control" id="exampleInputMobile" value="<? echo $donne['PTRA'];?>">
                          <?php } else { ?>
                          <input type="text" name="PTRA" id="PTRA" class="form-control" id="exampleInputMobile" placeholder="PTRA" >
                          <?php }?>
                        </div> 
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                          PTAC
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="PTAC" id="PTAC" class="form-control" id="exampleInputMobile" value="<? echo $donne['PTAC'];?>">
                          <?php } else { ?>
                          <input type="text" name="PTAC" id="PTAC" class="form-control" id="exampleInputMobile" placeholder="PTAC" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                          PV
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="PV" id="PV" class="form-control" id="exampleInputMobile" value="<? echo $donne['PV'];?>">
                          <?php } else { ?>
                          <input type="text" name="PV" id="PV" class="form-control" id="exampleInputMobile" placeholder="PV" >
                          <?php }?>
                        </div> 
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                            CU
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="CU" id="CU" class="form-control" id="exampleInputMobile" value="<? echo $donne['CU'];?>">
                          <?php } else { ?>
                          <input type="text" name="CU" id="CU" class="form-control" id="exampleInputMobile" placeholder="CU" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                        PTRA
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="PTRA" id="PTRA" class="form-control" id="exampleInputMobile" value="<? echo $donne['PTRA'];?>">
                          <?php } else { ?>
                          <input type="text" name="PTRA" id="PTRA" class="form-control" id="exampleInputMobile" placeholder="PTRA" >
                          <?php }?>
                        </div> 
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                          Type de véhicule
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Type_vehicule" id="Type_vehicule" class="form-control" id="exampleInputMobile" value="<? echo $donne['Type_vehicule'];?>">
                          <?php } else { ?>
                          <input type="text" name="Type_vehicule" id="Type_vehicule" class="form-control" id="exampleInputMobile" placeholder="Type de véhicule" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                        <?php if (isset($_GET['id'])){?>
                          Concessionnaire
                          <input type="text" name="Concessionnaire" id="Concessionnaire" class="form-control" id="exampleInputMobile" value="<? echo $donne['Concessionnaire'];?>">
                          <?php } else { ?>
                          <input type="text" name="Concessionnaire" id="Concessionnaire" class="form-control" id="exampleInputMobile" placeholder="Concessionnaire" >
                          <?php }?>
                        </div> 
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                          Categorie
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="categorie" id="categorie" class="form-control" id="exampleInputMobile" value="<? echo $donne['categorie'];?>">
                          <?php } else { ?>
                          <input type="text" name="categorie" id="categorie" class="form-control" id="exampleInputMobile" placeholder="Categorie" >
                          <?php }?>
                         
                         </div>
                        <div class="col">
                         Taux /km 
                        <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Tauxkm" id="Tauxkm" class="form-control" id="exampleInputMobile" value="<? echo $donne['Tauxkm'];?>">
                          <?php } else { ?>
                          <input type="text" name="Tauxkm" id="Tauxkm" class="form-control" id="exampleInputMobile" placeholder="Tauxkm" >
                          <?php }?>
                        </div> 
                      </div>
                      <br/> 
                      <div class="form-row">
                          <div class="col">
                            Forfaits déplacement
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="Forfaits_deplacement" id="Forfaits_deplacement" class="form-control" id="exampleInputMobile" value="<? echo $donne['Forfaits_deplacement'];?>">
                          <?php } else { ?>
                          <input type="text" name="Forfaits_deplacement" id="Forfaits_deplacement" class="form-control" id="exampleInputMobile" placeholder="Forfaits déplacement" >
                          <?php }?>
                         
                         </div>
                        
                      </div>
                      <br/> 
                      <button  id="sort" name="sopiau" class="btn btn-info btn-sm">Modifier</button>
                      <button type="submit" id="sort" name="yondeau" class="btn btn-warning btn-sm">Valider</button>
                      <button  onclick="confirmer()" id="sort" name="dindiau" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                        <script>
                          var login = document.forms["diapau"]["Nom_vehicule"];
                       

                          if(num_immat.value==""){
                            alert("saisissez le nom du véhicule !");
                            num_immat.focus();
                            return false;
                          }
                      
                         
                        </script>
                    </div>
                   
                </div>
               </div>
        
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Parc automobile</h4>
               
                <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th></th>
                                <th> Prénom & Nom</th>
								                <th> Véhicule</th>
							                	<th> Numéro Immatr.</th>
                                <th> Date Immatriculation</th>
                                <th> Couleur</th>
                                <th> Energie</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th>  </th>    
                              <th> Prénom & Nom</th>
							              	<th> Véhicule</th>
							              	<th> Numéro Immatr.</th>
                              <th> Date Immatriculation</th>
                              <th> Couleur</th>
                              <th> Energie</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT perso.PRENOMNOM, vehicules.couleur,
                              vehicules.num_immat,vehicules.Date_immat,vehicules.Num_titulaire,
                              vehicules.Prenomnom_titulaire,vehicules.Nom_vehicule,vehicules.id_vehucules
                              FROM perso,vehicules
                              WHERE perso.IDPERSONNEL= vehicules.IDPERSONNEL
                              ORDER BY Nom_vehicule ");
                              while($donnees = $reponse->fetch()){
                                ?>
                              <tr>
                                 <th> <a href="auto.php?id=<?php echo $donnees['id_vehucules'];?>">Choisir </a></th> 
                                <td><?php echo htmlspecialchars($donnees['PRENOMNOM']); ?></td>
								                <td><?php echo htmlspecialchars($donnees['Nom_vehicule']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['num_immat']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['Date_immat']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['couleur']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['energie']); ?></td>
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
          var res = confirm("Ëtes-vous sûr de vouloir supprimer le véhicule ?");
          if (res){

          }
        }
     </script>
 </div