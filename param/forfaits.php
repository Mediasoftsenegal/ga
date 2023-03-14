<?php 
require '../header0.php'; 
if (isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017'); 
    $id_vehucules=$_GET['id'];
    $repon = $db->query("SELECT * FROM taux_missions WHERE id_taux = ".$id_vehucules."");
    $donne = $repon->fetch();
}
?>
<!--div class="main-panel"-->
<div class="content-panel">
    <div class="content-wrapper">
        <div class="row" id="proBanner">
            <div class="col-12">
              </div>
        </div>
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-box-outline"></i>
                </span> Gestion des fofaits - Hébergements et voyages </h3>     
        </div>

    <div class="row">
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                      <h4 class="card-title">Détails des forfaits</h4>
                    <!--div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"-->
                         <form name="diapfo" class="forms-sample" action="doli.php"  onsubmit="return W3docs()" method="POST">
                         <div class="form-row">
                          <div class="col">
                          Période 
                          <?php if (isset($_GET['id'])){?>
                          <input type="text" name="nperiod" id="nperiod" class="form-control" id="exampleInputMobile" value="<?php echo utf8_encode($donne['periode']);?>">
                          <?php } else { ?>                        
                          <input type="text" name="nperiod" id="nperiod" class="form-control" id="exampleInputMobile" placeholder="Période" required>
                          <?php }?>                         
                         </div>                        
                      </div>
                      <br/>                  
                      <h4> Repas </h4><br/>
                      <div class="row">
                      <div class="col">
                        Taux repas Ingénieur CFA
                        <?php if (isset($_GET['id'])){?>
                          <input type="int" name="taux_repasing" id="taux_repasing" class="form-control" id="exampleInputMobile" value="<? echo $donne['taux_repasing'];?>">
                          <?php } else { ?>
                          <input type="int" name="taux_repasing" id="taux_repasing" class="form-control" id="exampleInputMobile" placeholder="Taux repas ingénieur">
                          <?php }?>
                        </div>
                      <div class="col">
                      Taux repas inspecteur  CFA
                      <?php if (isset($_GET['id'])){?>                       
                      <input type="int" class="form-control" id="taux_repasins" placeholder="Taux repas inspecteur" name="taux_repasins" value="<? echo $donne['taux_repasins'];?>">
                      <?php } else { ?>
                        <input type="int" class="form-control" id="taux_repasins" placeholder="Taux repas inspecteur" name="taux_repasins">
                      <?php }?> 
                      </div>
                      
                      </div>
                      <br/>
                      <h4> Hébergements </h4><br/>
                      <div class="form-row">
                      <div class="col">
                        Forfait nuitée CFA
                        <?php if (isset($_GET['id'])){?>
                        <input type="int" class="form-control" placeholder="Forfait nuité" name="forfait_nuite" value="<? echo $donne['forfait_nuite'];?>">
                        <?php } else { ?>
                        <input type="int" class="form-control" placeholder="Forfait nuité" name="forfait_nuite">
                        <?php }?> 
                      </div>
                      </div>
                      <br/>
                      
                      <div class="form-row">
                          <div class="col">
                          Forfait Afrique jour CFA
                          <?php if (isset($_GET['id'])){?>
                          <input type="int" name="forfait_afriquejour" id="forfait_afriquejour" class="form-control" id="exampleInputMobile" value="<? echo $donne['forfait_afriquejour'];?>">
                          <?php } else { ?>
                          <input type="int" name="forfait_afriquejour" id="forfait_afriquejour" class="form-control" id="exampleInputMobile" placeholder="Forfait Afrique jour" >
                          <?php }?>                         
                         </div>
                         <br/>
                         <div class="row">
                      <div class="col">
                      Forfait Afrique jour dernier jour CFA
                        <?php if (isset($_GET['id'])){?>
                          <input type="int" name="afrik_last_day" id="afrik_last_day" class="form-control" id="exampleInputMobile" value="<? echo $donne['forfait_afriquejourder'];?>">
                          <?php } else { ?>
                          <input type="int" name="afrik_last_day" id="afrik_last_day" class="form-control" id="exampleInputMobile" placeholder="Forfait Afrique jour dernier jour">
                          <?php }?>
                        </div> 
                      </div>
                      </div>
                      <br/> 
                      <br/>
                      
                      <div class="form-row">
                          <div class="col">
                          Forfait hors Afrique jour
                          <?php if (isset($_GET['id'])){?>
                          <input type="int" name="forfait_horsafrique" id="forfait_horsafrique" class="form-control" id="exampleInputMobile" value="<? echo $donne['forfait_horsafrique'];?>">
                          <?php } else { ?>
                          <input type="int" name="forfait_horsafrique" id="forfait_horsafrique" class="form-control" id="exampleInputMobile" placeholder="Forfait hors Afrique jour" >
                          <?php }?>                         
                         </div>
                         <br/>
                         <div class="row">
                      <div class="col">
                      Forfait hors Afrique jour dernier jour
                        <?php if (isset($_GET['id'])){?>
                          <input type="int" name="forfait_horsafriquejourder" id="forfait_horsafriquejourder" class="form-control" id="exampleInputMobile" value="<? echo $donne['forfait_horsafriquejourder'];?>">
                          <?php } else { ?>
                          <input type="int" name="forfait_horsafriquejourder" id="forfait_horsafriquejourder" class="form-control" id="exampleInputMobile" placeholder="Forfait hors Afrique jour dernier jour" >
                          <?php }?>
                        </div> 
                      </div>
                      </div>
                      <br/> 
                      <button  id="sort" name="sopifo" class="btn btn-info btn-sm">Modifier</button>
                      <button type="submit" id="sort" name="yondefo" class="btn btn-warning btn-sm">Valider</button>
                      <button  onclick="confirmer()" id="sort" name="dindifo" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                        <script>
                          var login = document.forms["diapfo"]["periode"];
                       

                          if(num_immat.value==""){
                            alert("saisissez la période !");
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
                <h4 class="card-title">Forfaits Héberements et voyages </h4>
               
                <div class="table-responsive"> 
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                              <th></th>
                              <th> Période</th>
								              <th> Taux repas Ingénieur</th>
							                <th> Taux repas inspecteur</th>
                              <th> Forfait Nuitée </th>
                              <th> Forfait Afrique jour </th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th>  </th>    
                              <th> Période</th>
								              <th> Taux repas Ingénieur</th>
							                <th> Taux repas inspecteur</th>
                              <th> Forfait Nuitée </th>
                              <th> Forfait Afrique jour </th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php 
                              $i = 0;
                              $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
                              $reponse = $db->query("SELECT * FROM taux_missions");
                              while($donnees = $reponse->fetch()){
                                ?>
                              <tr>
                                <td> <a href="forfaits.php?id=<?php echo $donnees['id_taux'];?>">Choisir </a></td> 
                                <td><?php echo utf8_encode($donnees['periode']); ?></td>
								<td><?php echo htmlspecialchars($donnees['taux_repasing']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['taux_repasins']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['forfait_nuite']); ?></td>
                                <td><?php echo htmlspecialchars($donnees['forfait_afriquejour']); ?></td>
                             
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
          var res = confirm("Ëtes-vous sûr de vouloir supprimer ce forfait ?");
          if (res){

          }
        }
     </script>
 </div