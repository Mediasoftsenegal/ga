<?php 
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];
require '../header0.php'; ?>

<div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
              
              </div>
            </div>
<div class="page-header">
    <h3 class="page-title">
		<span class="page-title-icon bg-gradient-primary text-white mr-2">
         <i class="mdi mdi-home"></i>
        </span> Paramétrages </h3>     
</div>
 <div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
            <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Accès à la plateforme<i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
            <h2 class="mb-5">Utilisateurs</h2>
            <button  onclick="window.location.href = 'user.php';" class="btn btn-success mr-2">Ouvrir</button>
                      
			</div>
         </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Attribution<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">Parc automobile</h2>
                    <button onclick="window.location.href = 'auto.php';" class="btn btn-warning mr-2">Ouvrir</button>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Déplacements-Caburant<i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">Forfaits</h2>
                    <button type="submit" class="btn btn-danger mr-2">Ouvrir</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                 
                    <div class="d-flex">
                      <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                       
                       
                      </div>
                      <div class="d-flex align-items-center text-muted font-weight-light">
                  
           
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 pr-1">
                        <img src="../assets/images/dashboard/fonds.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        
                      </div>
                      
                    </div>
                    <div class="d-flex mt-5 align-items-top">
                      
                      
                      <div class="ml-auto">
                        <i class="mdi mdi-heart-outline text-muted"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 </div>			