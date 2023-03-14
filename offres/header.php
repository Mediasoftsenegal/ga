<?php require '../db.class.php'; 

$DB = new DB();

session_start();

if ($_SESSION["connecter"] != "Oui") {

    header("location:../lock.php");exit();	

} else {

	$bienvenue = 	$_SESSION["nom"];

}?>

<!DOCTYPE html>

<html lang="fr">



<head>

<<meta charset="ISO-8859-1">">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="Dashboard">

    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Gestion administrative :  <?= strtoupper($bienvenue) ?></title>



    <!-- Favicons -->

    <link href="../img/dent.png" rel="icon">

    <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">



    <!-- Bootstrap core CSS -->

    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--external css-->

    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="../lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />

    <link href="../lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />

    <link rel="stylesheet" href="../lib/advanced-datatable/css/DT_bootstrap.css" />

    <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />

    <link href="../lib/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />

    <!-- Custom styles for this template -->

    <link href="../css/style.css" rel="stylesheet">

    <link href="../css/style-responsive.css" rel="stylesheet">

</head>



<body>

    <!--header start-->

    <header class="header black-bg">

        <!--logo start-->

        <a href="../tabbord/tabbord.php" class="logo"><b>Dr <span><?= $bienvenue ?></span></b></a>

        <!--logo end-->

        <div class="top-menu">

            <ul class="nav pull-right top-menu">

                <!-- settings start -->

                <li>

                    <a class="logout" href="../tabbord/tabbord.php">

                        <i class="fa fa-dashboard"></i>

                        Accueil

                    </a>

                </li>

                <li>

                    <a class="logout" href="../patient/patient.php">

                        <i class="fa fa-user"></i>

                        Patient

                    </a>

                </li>

                <li>

                    <a class="logout" href="../price/prix.php">

                        <i class="fa fa-money"></i>

                        Liste des prix

                    </a>

                </li>

                <li>

                    <a class="logout" href="../visite/visite.php">

                        <i class="fa fa-calendar"></i>

                        Visites

                    </a>

                </li>

                <li>

                    <a class="logout" href="#">

                        <i class="fa fa-dashboard"></i>

                        Dépenses

                    </a>

                </li>

                <li>

                    <a class="logout" href="#">

                        <i class="fa fa-dashboard"></i>

                        Statistiques

                    </a>

                </li>

                <li>

                    <a class="logout" href="../traitement/trait.php">

                        <i class="fa fa-cogs"></i>

                        Paramètres

                    </a>

                </li>

                <!-- notification dropdown end -->

                <li>

                    <a class="logout" href="../index.php">

                        <i class="fa fa-power-off"></i>

                        Déconnexion

                    </a>

                </li>

            </ul>

        </div>

    </header>

    <!--header end-->

    <!--main content start-->

    <section>

        <section class="wrapper">