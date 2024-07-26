<?php

    include('model.php');
    $sql=new model;
    if (empty($_SESSION['id'])) {
        # code...
        header('location:login.php');
    }
    $_SESSION['modif_username'] = "";
    $_SESSION['modif_password'] = "";
   
    if(isset($_GET['mod']) && !empty($_GET['mod']) ){
        $_SESSION['mod']=$_GET['mod'];
        $un_utilisateur= $sql->un_utilisateur($_SESSION['mod']);
        while ($un_utilisateurs = $un_utilisateur->fetch()) {
            $_SESSION['modif_username'] = $un_utilisateurs['username'];
            $_SESSION['modif_password'] = $un_utilisateurs['password'];
           
        }
    }

    require('verification_compte.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Modification utilisateur</title>
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


        <!-- Sidbar menu -->
        <?php include('navbar.php') ?>

        <div id="main-content">
            <div class="container-fluid">
            <div class="block-header py-lg-4 py-3">
                    <div class="row g-3">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Modifier un utilisateur</h2>

                        </div>

                    </div>
                </div>

                      <form action="" enctype="multipart/form-data" method="post">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3 clearfix">
                                        <div class=" col-md-3 col-sm-12">
                                           Nom d'utilisateur: <input type="text" name="username" class="form-control" value="<?php echo($_SESSION['modif_username']); ?>" placeholder="username">
                                        </div>
                                         <div class=" col-md-3 col-sm-12">
                                            Mot de passe: <input type="password" name="password"  value="<?php echo($_SESSION['modif_password']); ?>" class="form-control" placeholder="password">
                                        </div>
                                       
                   
                                    
                                        <div class="col-sm-12">
                                            <input type="submit" name="update" class="btn btn-primary" value="Modifier"/>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>






                <div class="block-header py-lg-4 py-3">
                    <div class="row g-3">
                        <div class="col-md-6 col-sm-12">
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>

    <!-- Default Size -->

</div>
<!-- core js file -->
<script src="assets/bundles/libscripts.bundle.js"></script>

<script src="assets/bundles/dataTables.bundle.js"></script>

<!-- page js file -->
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script>
    $(document).ready(function () {
        $('#employee_List')
        .dataTable({
            responsive: true,
            columnDefs: [
                {
                    orderable: false,
                    targets: [0]
                }
            ]
        });
    });
</script>
</body>

</html>