<?php require '../headers.php'; 
  include('conf.php');	 
	$periode=htmlspecialchars($_POST['Annee']).htmlspecialchars($_POST['mois']).''.'01';
	$id=$_SESSION["IDPERSONNEL"];
	$date = $periode;
  $dates =$_POST['Annee'].'-'.$_POST['mois'];

	$lastday=strftime("%Y%m%d",mktime(0,0,0,$_POST['mois']+1,0,$_POST['Annee']));
	$firstday=strftime("%Y%m%d",mktime(0,0,0,$_POST['mois'],1,$_POST['Annee']));
	setlocale(LC_MONETARY,"fr_FR");
	$datedeb=substr($firstday, 6, 2).'/'.substr($firstday, 4, 2).'/'.substr($firstday, 0,4);
	$datefin=substr($lastday, 6, 2).'/'.substr($lastday, 4, 2).'/'.substr($lastday, 0,4);
	?>
        <!--div class="main-panel"-->
          <div class="content-wrapper">            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Edition de carnets d'activité</h4>
                <div class="col-md-6">
					        <div class="template-demo">
                     <div class="form-group"><br>
						          <div class="form-group row">
                        <div class="col">
                          <label>Employé:</label>
                          <input disabled type="text" class="form-control" id="inlineFormInputGroupUsername2" value="<? echo $_SESSION['nom_afficher'];?>">
                        </div>
                        <div class="col">
                          <label>Période:</label>
                          <input disabled type="text" class="form-control" id="inlineFormInputGroupUsername2" value="<? echo ' Du '.($datedeb.' au '.$datefin);?>">
                        </div>							
                      </div>
					          </div>
					      </div>
					    </div>
					</div>
					<h3 class="page-title"> Etape 2 </h3>
					<div class="progress">
					<div class="progress-bar bg-gradient-success" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div><br>

              <div class="card-body">
				      <div class="row">
				      <div class="col-md-7">
            		<div class="template-demo mt-4"> 
                    <div class="table-responsive"> 
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Affaire</th>
                    <th>Code</th>                               
                    <th>Temps ext.</th>    
								    <th>Temps bureau</th>
								    <th>Moyen de transport</th>
                    <th>KM / Forfaits déplacements</th>
                    <th>Perdiems</th>
								    <th>Nombre de jours	</th>
								    <th>Dernier jour </th>
                    <th>Nombre de repas	</th>
								    <th>Nombre de nuites</th>
								    <th>Frais divers</th>
								    <th> ... </th>                     
                  </tr>
                  </thead>
                    <tfoot>
                      <tr>
                        <th>Date</th>
                        <th>Affaire</th>
                        <th>Code</th>                               
                        <th>Temps ext.</th>    
								        <th>Temps bureau</th>
								        <th>Moyen de transport</th>
                        <th>KM / Forfaits déplacements</th>
                        <th>Perdiems</th>
								        <th>Nombre de jours	</th>
								        <th>Dernier jour </th>
                        <th>Nombre de repas	</th>
								        <th>Nombre de nuites</th>
								        <th>Frais divers</th>
								      <th> ... </th>
                   </tr>
                  </tfoot>
                <tbody>
                <?php 
                $i = 0;
                $db = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
							  //forfaits
							  $rep=$db->query("SELECT * FROM taux_missions order by id_taux desc LIMIT 1");
							  while($don = $rep->fetch()){
								  $txrepas=$don['taux_repasing'];$txnuite=$don['forfait_nuite'];
								  $tauxaj=$don['forfait_afriquejour'];
								  $tauxajd=$don['forfait_afriquejourder'];
								  $tauxhaj=$don['forfait_horsafrique'];
								  $tauxhadj=$don['forfait_horsafriquejourder'];
							  } 
							  // tx et forfaits
							  $red=$db->query("SELECT IDPERSONNEL,Tauxkm,Forfaits_deplacement FROM `vehicules` WHERE IDPERSONNEL=".$_SESSION["IDPERSONNEL"]);
							  
							  while($dond = $red->fetch()){
								  $txkm=$dond['Tauxkm']; 
								  $fordepl=$dond['Forfaits_deplacement'];
								  
							  }
							  // carnet
                //$reponse = $db->query("SELECT * FROM carnets INNER JOIN perso ON carnets.IDPERSONNEL = perso.IDPERSONNEL
								//INNER JOIN offres ON carnets.IDOFFRES = offres.IDOFFRES 
								//WHERE carnets.IDPERSONNEL =".$_SESSION["IDPERSONNEL"]." 
								//AND carnets.DATE_CONTRAT BETWEEN '$firstday' AND '$lastday' 
								//ORDER BY carnets.DATE_CONTRAT ASC");*
                $reponse = $db->query("SELECT carnets.IDPERSONNEL,offres.AFFAIRE,carnets.SEMAINE,carnets.DATE_CONTRAT,carnets.TEMPS_EXTER,
                carnets.TEMPS_BUREAU,carnets.KILOMETRAGES,carnets.REFERENCE,carnets.MONTANT,carnets.TRANSPORT,carnets.KMTRANSPORT,
                carnets.NBRETRANSPORT,carnets.JUSTIFTRANS,carnets.MTTRANSPORT,carnets.PERDIEM,carnets.NBREPERDIEM,carnets.DERNIERJOUR,
                carnets.JUSTIFPERDIEM,carnets.FRAISDIVERS,carnets.JUSTIFDIVERS,carnets.MTFRAISDIVERS,carnets.AVANCES,carnets.MT_LOCATION,
                carnets.NBREPAS,carnets.NBRENUITE,carnets.JUSTIFREPAS,carnets.JUSTIFNUITE,carnets.JUSTIFDEMARCHES,carnets.VISAING,carnets.VISARES
                FROM carnets,offres
                WHERE carnets.IDPERSONNEL =".$_SESSION["IDPERSONNEL"]." 
                AND offres.IDOFFRES =carnets.IDOFFRES
                AND LEFT(carnets.DATE_CONTRAT,7) ='".$dates."'");
                

                 while($donnees = $reponse->fetch()){
                ?>
                <tr>
								<? $dater=explode('-',$donnees['DATE_CONTRAT'])?>
                                <td><? echo($dater[2].'-'.$dater[1].'-'.$dater[0]) ?></td>
								<? $snomaff=sautpoint(sautligne($donnees['AFFAIRE']))?>
                                <td><?= utf8_encode($snomaff) ?></td>  
								<td><?= $donnees['SEMAINE'] ?></td>			
                                <td><?= $donnees['TEMPS_EXTER'] ?></td>
                                <td><?= $donnees['TEMPS_BUREAU'] ?></td>
                                <td><?= $donnees['TRANSPORT'] ?></td>                                
                                <td><?= $donnees['KMTRANSPORT'] ?></td>
                                <td><?= $donnees['PERDIEM'] ?></td>
								<td><?= $donnees['NBREPERDIEM'] ?></td>
								<td><?= $donnees['DERNIERJOUR'] ?></td>
                                <td><?= $donnees['NBREPAS'] ?></td>
                                <td><?= $donnees['NBRENUITE'] ?></td> 
								<td><?= $donnees['MTFRAISDIVERS'] ?></td> 					
                                <td align="center">
                                  <a href="details.php?det="><i class="mdi mdi-clipboard-outline"></i></a>
                                  <a href="modifcl.php?mo="><i class="mdi mdi-pencil"></i></a>
                                </td>
                              </tr>
                              <?php } $reponse->closeCursor(); ?>
                            </tbody>
							
                          </table>
                        </div>
                    </div>
					 </div>
					 <div class="col-md-5">
					
					 <div class="card-body">
					 <form method="GET" action="carnact.php" target="_blank">
            <input type="hidden" name="first" value="<?= $firstday ?>">
            <input type="hidden" name="last" value="<?= $lastday ?>">							
							<input type="submit" class='btn btn-gradient-dark btn-fw' value="Imprimer">
					</form>
					<br><br>
                    <h4 class="card-title">Récapitulatif</h4>
					<h6 class="ml-1 mb-1"> <i class="mdi mdi-hotel"></i>   Hébergerment ----> </h6>
                    <div class="template-demo">
                      <table class="table mb-0">
                        <thead>
                          <tr>
                            <th class="pl-0">Libellé</th>
                            <th class="text-right">Nombre/Montant</th>
                          </tr>
                        </thead>
                        <tbody>
						
                          <tr>
                            <td class="pl-0"><i class="mdi mdi-bowl"></i>  Nombre de repas   :</td>
                            <td class="pr-0 text-right">
							  <div class="badge badge-pill badge-primary"><? echo $resto=nbtotalrep($_SESSION["IDPERSONNEL"],$firstday,$lastday);?></div>
							  <? $montrepas=intval($resto)*$txrepas ?>
                              <div class="badge badge-pill badge-primary"><? echo number_format($montrepas, 0, ',', ' ');?> F CFA</div>
                            </td>
                          </tr>
                          <tr>
                            <td class="pl-0"><i class="mdi mdi-home"></i>  Nombre de nuités   :</td>
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-info"><? echo $resnui=nbtotalnuite($_SESSION["IDPERSONNEL"],$firstday,$lastday);?></div>
							  <? $montnuite=intval($resnui)*$txnuite ?>
							  <div class="badge badge-pill badge-info"><? echo number_format($montnuite, 0, ',', ' ');?> F CFA</div>
                            </td>
							</td>
                          </tr>
						  <tr>
                            <td class="alert-alert-success"><div class="alert alert-success" role="alert"><i class="mdi mdi-hotel"> Hébergement </i></div>  </td>	
							
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-danger"></div>
							  <? $monthebeg0=$montrepas?>
							  <? $monthebeg1=$montnuite?>
							  <? $totheg=$monthebeg0+$monthebeg1;?>
							  
							  <div class="badge badge-pill badge-danger"><?  echo number_format($totheg, 0, ',', ' ');?> F CFA</div>
                            </td>
                          </tr>
                         
                          <tr>
                            <td class="pl-0"><i class="mdi mdi-car"></i> Voiture(km) :</td>
                            <td class="pr-0 text-right">
                              <div class="badge badge-gradient-success badge-pill"><? echo $resvoit=nbtotalkm($_SESSION["IDPERSONNEL"],$firstday,$lastday);?></div>
							  <? $totvoit=intval($resvoit)*$txkm?>
							  <div class="badge badge-pill badge-success"><?  echo number_format($totvoit, 0, ',', ' ');?> F CFA</div>
                            </td>
                          </tr>
                          <tr>
                            <td class="pl-0"><i class="mdi mdi-human-handsdown"></i> Forfaits déplacements</td>
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-info"><? echo $resdepl=nbtotaldpl($_SESSION["IDPERSONNEL"],$firstday,$lastday);?></div>
							   <? $totfor=intval($resdepl)*$fordepl?>
							  <div class="badge badge-pill badge-info"><?  echo number_format($totfor, 0, ',', ' ');?> F CFA</div>
                            </td>
                          </tr>
						  <tr>
                            <td class="pl-0"> <i class="mdi mdi-airplane"></i> Avions/train</td>
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-warning"></div>
							  <div class="badge badge-pill badge-warning"></div>
                            </td>
                          </tr>
						  <td class="alert-alert-success"><div class="alert alert-success" role="alert"><i class="mdi mdi-car"> Total Transport </i></div>  </td>
						    <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-danger"></div>
							   <? $tottrans=$totfor+$totvoit;?>
							  <div class="badge badge-pill badge-danger"><?  echo number_format($tottrans, 0, ',', ' ');?> F CFA</div>
                            </td>
							
							<tr>
							<td><h6 class="ml-1 mb-1"> <i class="mdi mdi-account-card-details"></i>  Perdièmes  ----> </h6></td>
							<tr>
                            <td class="pl-0"><i class="mdi mdi-airplane-takeoff"></i>  Perdième Hors Afrique :</td>
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-success"><? echo $Pha=hafj($_SESSION["IDPERSONNEL"],$firstday,$lastday);?></div>
							  <?  $totPhaj=intval($tauxhaj)*intval($Pha);?>
							  <div class="badge badge-pill badge-success"><?  echo number_format($totPhaj, 0, ',', ' ');?> F CFA</div>
                            </td>
							</tr>
							<tr>
							<td class="pl-0"><i class="mdi mdi-airplane-takeoff"></i>  Perdième Hors Afrique dernier jour :</td>
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-success"><? echo $Phadj=dhafj($_SESSION["IDPERSONNEL"],$firstday,$lastday);?></div>
							  <?  $totPhadj=intval($tauxhadj)*intval($Phadj);?>
							  <div class="badge badge-pill badge-success"><?  echo number_format($totPhadj, 0, ',', ' ');?> F CFA</div>
                            </td>
                          </tr>
								 
						  <tr>
							<td class="pl-0"><i class="mdi mdi-airplane-landing"></i>  Perdième Afrique : </td>
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-success"><? echo $Paj=afj($_SESSION["IDPERSONNEL"],$firstday,$lastday);?></div>
							  <?  $totPaj=intval($tauxaj)*intval($Paj);?>
							  <div class="badge badge-pill badge-success"><? echo number_format($totPaj, 0, ',', ' ');?> F CFA</div>
                            </td>
                          </tr>
						  <tr>
							<td class="pl-0"><i class="mdi mdi-airplane-landing"></i>  Perdième Afrique dernier jour : </td>
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-success"> <? echo $Padj=derafj($_SESSION["IDPERSONNEL"],$firstday,$lastday);?></div>
							  <?  $totPadj=intval($tauxajd)*intval($Padj);?>
							  <div class="badge badge-pill badge-success"><? echo number_format($totPadj, 0, ',', ' ');?> F CFA</div>
                            </td>
							</tr>
						  <tr>
						  <td class="alert-alert-success"><div class="alert alert-success" role="alert"><i class="mdi mdi-car"> Total Perdième </i></div>  </td>
							<td class="pr-0 text-right">
                              <div class="badge badge-pill badge-danger"></div>
							  <?  $totgpaj=$totPhaj+$totPhadj+$totPaj+$totPadj;?>
							  <div class="badge badge-pill badge-danger"><? echo number_format($totgpaj, 0, ',', ' ');?> F CFA</div>
                            </td>
                          </tr>
							</tr>
							<tr>
							
							<td><h6 class="ml-1 mb-1"><i class="mdi mdi-shopping"></i>   Frais divers  ----> </h6></td>
							<tr>
							<tr>							
							 <td class="alert-alert-success"><div class="alert alert-success" role="alert"><i class="mdi mdi-shopping"> Frais divers</i></div>
                            <td class="pr-0 text-right">
                              <div class="badge badge-pill badge-success"></div>
							  <?  $resfrais=nbtotalfrais($_SESSION["IDPERSONNEL"],$firstday,$lastday);?>
							  <div class="badge badge-pill badge-success"><? echo number_format($resfrais, 0, ',', ' ');?> F CFA</div>			
							</td>
							</tr>
                        </tbody>
                    </table>
                </div>
            </div>
			<div class="cartd card-inverse">
				<h6 class="ml-1 mb-1"> Totaux</h6>	
				<ul>
					<li><span class="legend-dots" style="background:linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))"></span> Transport<span class="float-right"><? echo number_format(intval($tottrans), 0, ',', ' ');?> F CFA </span>
					</li>
					<li><span class="legend-dots" style="background:linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))"></span>  Hébergement <span class="float-right"><? echo number_format(intval($totheg), 0, ',', ' ');?> F CFA </span>
					</li>
					<li><span class="legend-dots" style="background:linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))"></span> Perdiems: <span class="float-right"><? echo number_format(intval($totgpaj), 0, ',', ' ');?> F CFA</span>
					</li>
					<li><span class="legend-dots" style="background:linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))"></span> Divers: <span class="float-right"><? echo number_format(intval($resfrais), 0, ',', ' ');?> F CFA</span>
					</li>
					<li><span class="legend-dots" style="background:linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))"></span> Total Général  <?  $tg=intval($tottrans+$totheg+$resfrais+$totgpaj);?>
					<span class="float-right"><? echo number_format(intval($tg), 0, ',', ' ');?> F CFA</span>
					</li>
				</ul>
            </div>
                    </div>
                  </div>
					 </div>
					  </div>
                  </div>
                </div>		   
              </div>
            </div>
          </div>
        </div>
      </div>
          <!-- content-wrapper ends -->
<!-- Modal -->

<?php require '../footer.php'; ?>