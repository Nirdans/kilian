<?php

    include('model.php');
    $sql=new model;
    if (empty($_SESSION['id'])) {
        # code...
        header('location:login.php');
    }
  
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>:: KILIAN :: </title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lucid HR & Project Admin Dashboard Template with Bootstrap 5x">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="assets/images/paper-plane.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/dataTables.min.css">
    
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

<div id="layout" class="theme-green">


    <div id="wrapper">

        <!-- top navbar -->
        <nav class="navbar navbar-fixed-top">

        </nav>

        <!-- Sidbar menu -->

        <?php include('navbar.php') ?>

        <div id="main-content">
            <div class="container-fluid">

                <div class="block-header py-lg-4 py-3">
                    <div class="row g-3">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Espace Administrateur</h2>
                          
                        </div>
                     
                    </div>
                </div>

                <div class="row g-2 row-deck mb-2">
                   

                <div class="col-lg-12 col-md-12">
                   <div class="card">
                            
                        <div class="card-body">
                        <h1 class="text-center" style="font-family: 'stencil',sans-serif;"></h1>
                        </div>
                    </div>

                    </div>
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div id="wrok_report"><h2>Bienvenue dans l'Espace Administrateur Mr/Mme  <strong class="text-uppercase"><?php echo($_SESSION['username']); ?></strong></h2></div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-lg-12 col-md-12">
                   <div class="card">
                            
                        
                    </div>

                    </div>

                </div>

               

            </div>
        </div>

    </div>

</div>
<!-- core js file -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/dataTables.bundle.js"></script>

<!-- page js file -->
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="../js/pages/index2.js"></script>
<script>
    $(document).ready(function () {
        $('#pro_list').dataTable({
            responsive: true,
        });
    });
</script>
</body>
</html>