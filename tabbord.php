<?php require 'header.php';
 require 'connect.php';
 session_start();
	  ?>
        <!-- partial -->
        <div class="content-wrapper">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
              
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Tableau de bord </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span><?php echo $_SESSION["nom_afficher"] ?> => </span><?php echo $_SESSION["Profileur"]; ?> <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h2 class="mb-5">Offres</h2>
                    <h6 class="card-text">Evolution sur 5 ans</h6>
                    <table class="table">
                        <thead>
                          <tr>
                            <th> Année </th>
                            <th> Nombre offres </th>
                          </tr>
                        </thead>
                    <?php $res=nombreoffre();
                    echo "<tbody>";
                    echo "<tr>";
                    while($row=mysqli_fetch_array($res)){
                      echo "<tr>";
                      echo "<td>"; echo $row["ANNEE"]; echo "</td>";
                      echo "<td>"; echo $row["NBRE"];  echo "</td>";
                      echo "<tr>";
                    }
                    ?>
                    </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    
                    <h2 class="mb-5">Commandes</h2>
                    <h6 class="card-text">Evolution sur 5 ans</h6>
                    <table class="table">
                        <thead>
                          <tr>
                            <th> Année </th>
                            <th> Nombre Commandes </th>
                          </tr>
                        </thead>
                    <?php $res=nombrecomm();
                    echo "<tbody>";
                    echo "<tr>";
                    while($row=mysqli_fetch_array($res)){
                      echo "<tr>";
                      echo "<td>"; echo $row["AN"]; echo "</td>";
                      echo "<td>"; echo $row["NBRE"];  echo "</td>";
                      echo "<tr>";
                    }
                    ?>
                    </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    
                    <h2 class="mb-5">Affaires</h2>
                    <h6 class="card-text">Evolution sur 5 ans</h6>
                    <table class="table">
                        <thead>
                          <tr>
                            <th> Année </th>
                            <th> Nombre Affaires </th>
                          </tr>
                        </thead>
                    <?php $res=nombreaffaire();
                    echo "<tbody>";
                    echo "<tr>";
                    while($row=mysqli_fetch_array($res)){
                      echo "<tr>";
                      echo "<td>"; echo $row["ANAFF"]; echo "</td>";
                      echo "<td>"; echo $row["nbre"];  echo "</td>";
                      echo "<tr>";
                    }
                    ?>
                    </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-left">Evolution des offres</h4>
                      <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    </div>
                    <canvas id="barChart" class="mt-4"></canvas>
                    <script>
                        $(document).ready(function(){
                          showGraph();
                        });
                       
                        function showGraph()
                        {
                          {
                            $.post("calcul.php", 
                            function (calcul)
                            {
                              console.log(calcul);
                              var ann = [];
                              var montan = [];

                              for (var i in calcul)
                              {
                                ann.push(calcul[i].ANNEE);
                                montan.push(calcul[i].MONTOFFRE);
                              }
                              var charcalcul = {
                                labels: ann,
                                datasets: [
                                  {
                                      label : 'Montant Honoraire',
                                      backgroundColor : '#49e2ff',
                                      borderColor : '#46d5f1',
                                      hoverBackgroundColor: '#CCCCCC',
                                      hoverBorderColor: '#666666',
                                      data : montan
                                  }
                                ]
                              };
                              var graphTarget = $("#barChart");
                              var barGraph =new Chart(graphTarget,{
                                type:'bar',
                                data: charcalcul
                              });
                            });
                          }
                        }
                   </script>  
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Evolution des affaires</h4>
                    <?php
                      $sql="SELECT ANAFF,offres.MONTANTHONORAIRE AS Montant
                      FROM affaires,offres
                      WHERE affaires.idoffres=offres.idoffres
                      GROUP BY ANAFF
                      order BY ANAFF  DESC LIMIT 5";
                      $ga_conn=ga_connexion();
                      $exe=mysqli_query($ga_conn,$sql);

                      $tabann=array();
                      $tabmont=array();
                      while($rows=mysqli_fetch_assoc($exe))
                        {
                          $tabann[]=$rows['ANAFF'];                      
                          $tabmont[]=$rows['Montant']; 
                        }
                        $chartan=json_encode($tabann);                                              
                        $chartmont=json_encode($tabmont,JSON_NUMERIC_CHECK);                        
                        
                    ?>
                    <canvas id="lineChart"></canvas>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                     <script
                       src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
                    <script>
                      new Chart(document.getElementById("lineChart"),{
                        type:'bar',
                        data : {
                          labels : <?php echo $chartan;?>,
                          datasets : [{                              
                              label: "montant annuel affaires",
                              backgroundColor:["#EBE0FF", "#FCDDB0",
                        "#FF9D76", "#FB3569", "#82CD47"],                        
                        data : <?php echo $chartmont;?>
                            }]
                          },
                          options :{
                              indexAxis: 'y',
                              legend: {
                                display:true
                              },
                              title:{
                                display:true,
                                text:''
                              }
                          }
                        }
                      );
                      </script>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-left">Evolution du nombre d'affaires</h4>
                      <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    </div>
                    <?php
                    $sql="SELECT ANAFF,SUM(IDAFFAIRES) AS NOMBR from affaires where ANAFF <>0  GROUP BY ANAFF ORDER BY ANAFF DESC LIMIT 5";
                    $ga_conn=ga_connexion();
                    $exe=mysqli_query($ga_conn,$sql);
                    
                    $dataann = array();
                    $datanbr = array();
                    while($row=mysqli_fetch_assoc($exe))
                    {
                      $label[]=$row["ANAFF"];
                      $datanbr[]=$row["NOMBR"];
                    }
                    $chartlabel = json_encode($label);          
                    $chartData = json_encode($datanbr);                 
                    ?>
                    <canvas id="doughnutChart" class="mt-4"></canvas>
                    <script
                      src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js">
                    </script>
                    <script>
                      new Chart(document.getElementById("doughnutChart"), {
                       type:'doughnut',
                       data: {
                          labels:<?php echo $chartlabel;?>,
                      datasets:[{
                          backgroundColor:["#51EAEA", "#FCDDB0",
                          "#FF9D76", "#FB3569", "#82CD47"],
                          data : <?php echo $chartData;?>
                                 }]
                               },
                         options: {
                          title : {
                          display:true,
                          text:'Evolution des affaires sur 5 ans'
                        },
                        cutout:'50%',
                        radius:200
                       }
                      });
                    </script> 
                </div>
              </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Statistiques des Offres/commandes/affaires</h4>
                    <?php 
                      // Offres
                      $sql="SELECT ANNEE,offres.MONTANTHONORAIRE AS Montant FROM offres GROUP BY ANNEE order BY ANNEE  DESC LIMIT 5";                 
                      $ga_conn=ga_connexion();
                      $exe=mysqli_query($ga_conn,$sql);
                      
                      $tabans=array();
                      $taboffr=array();
                      while($rowof=mysqli_fetch_assoc($exe))
                      {
                        $tabans[]=$rowof['ANNEE'];
                        $taboffr[]=$rowof['Montant'];
                      }
                      $chartlabeloff = json_encode($tabans);          
                      $chartDataoff = json_encode($taboffr,JSON_NUMERIC_CHECK);  
                      
                      //Commandes
                      $sql01="SELECT left(DATECOMMANDE,4)AS ANCOM,commandes.MONTANTHONOTAIRE AS Montant FROM commandes GROUP BY ANCOM order BY ANCOM  DESC LIMIT 5";
                      $ga_conn=ga_connexion();
                      $exe01=mysqli_query($ga_conn,$sql01);

                      $tabanc=array();
                      $tabcom=array();
                      while($rowc=mysqli_fetch_assoc($exe01))
                      {
                        $tabanc[]=$rowc['ANCOM'];
                        $tabcom[]=$rowc['Montant'];
                      }
                      $chartlabelcom = json_encode($tabanc);          
                      $chartDatacom = json_encode($tabcom,JSON_NUMERIC_CHECK); 
                     //Affaires
                      $sql02="SELECT ANAFF ,affaires.IDOFFRES,offres.IDOFFRES ,sum(offres.MONTANTHONORAIRE) AS Montant FROM affaires,offres WHERE affaires.IDOFFRES=offres.IDOFFRES GROUP BY ANAFF DESC LIMIT 5"; 
                      $ga_conn=ga_connexion();
                      $exe02=mysqli_query($ga_conn,$sql02);

                      $tabanaff=array();
                      $tabaff=array();
                      while($rowaff=mysqli_fetch_assoc($exe02))
                      {
                        $tabanaff[]=$rowaff['ANAFF'];
                        $tabaff[]=$rowaff['Montant'];
                      }
                      $chartlabelaff = json_encode($tabaff);          
                      $chartDataaff = json_encode($tabaff,JSON_NUMERIC_CHECK); 
                    ?>
                    <canvas id="areaChart"></canvas>
                    <div id="traffic-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    <script
                      src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
                      <script>
                          new Chart(document.getElementById("areaChart"), {
                            type: 'bar',
                            data: {
                              labels: <?php echo $chartlabeloff; ?>,
                              datasets: [{
                                label: "Offres",
                                backgroundColor: "#FF2F5E",
                                data: <?php echo $chartDataoff; ?>,
                              }, {
                                label: "Commandes",
                                backgroundColor: "#3DA0EB",
                                data: <?php echo $chartDatacom; ?>
                              }, {
                                label: "Affaires",
                                backgroundColor: "#FFBD22",
                                data: <?php echo $chartDataaff;?>
                              }]
                            },
                            options: {
                              legend: {
                                display: false
                              },
                              title: {
                                display: true,
                                text: ''
                              }
                            }
                          });
                      </script>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Project Status</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr
                            <th> # </th>
                            <th> Name </th>
                            <th> Due Date </th>
                            <th> Progress </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> 1 </td>
                            <td> Herman Beck </td>
                            <td> May 15, 2015 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 2 </td>
                            <td> Messsy Adam </td>
                            <td> Jul 01, 2015 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 3 </td>
                            <td> John Richards </td>
                            <td> Apr 12, 2015 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 4 </td>
                            <td> Peter Meggik </td>
                            <td> May 15, 2015 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 5 </td>
                            <td> Edward </td>
                            <td> May 03, 2015 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td> 5 </td>
                            <td> Ronald </td>
                            <td> Jun 05, 2015 </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-white">Todo</h4>
                    <div class="add-items d-flex">
                      <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
                      <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
                    </div>
                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Call John </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Create invoice </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Print Statements </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.php -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Médiasoft© 2020 </span>
              <?php setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');?>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <?php echo (strftime("%A %d %B %Y")); ?></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page >
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/highcharts.js"></script-->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/charts.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>