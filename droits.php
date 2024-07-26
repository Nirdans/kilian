<?php

    include('model.php');
    $sql=new model;
    if (empty($_SESSION['id'])) {
	
        header('location:login.php');
    }
    if (isset($_GET['utm']) && !empty($_GET['utm']) ) {
        # code...
        $_SESSION['user_id'] = $_GET['utm'];

        
    }
   
   


  /**
     * compte_admin
     */
    if (isset($_POST['compte_admin'])) {
        # code...
        $role_compte_admin=$_POST['role_compte_admin'];
                    # supprimer les anciens roles avant ajout
                    $role_compte_admin_user_del=$sql->role_compte_admin_user_del($_SESSION['user_id']);
        for ($i=0; $i < sizeof($role_compte_admin) ; $i++) { 
            $role_compte_admin_add=$sql->role_compte_admin_add($_SESSION['user_id'], $role_compte_admin[$i]);
        }
        echo "<script>alert(\"Rôles attribuer   .\")</script>"; 
    }
    //recuperer roles du user pour compte_admin
    $role_compte_admin_user_liste=$sql->role_compte_admin_user_liste($_SESSION['user_id']);
    $role_compte_admin_user_listes = $role_compte_admin_user_liste->fetchAll();
    $configurations_compte_admin = [];
    foreach ($role_compte_admin_user_listes as $key_compte_admin => $value_compte_admin) {
        $configurations_compte_admin[] = $value_compte_admin[0];
    }

 /**
  * compte_admin
  */


  if ($role_compte_admin_user_liste || $role_vendeur_user_liste || $role_comptabilite_user_liste || $role_configuration_user_liste) {
  //
  
 // echo '<script>location.reload();    </script>';  

  }


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Gestion des droits</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lucid HR & Project Admin Dashboard Template with Bootstrap 5x">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="assets/images/paper-plane.png" type="image/x-icon">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

<div id="layout" class="theme-green">
    <!-- Page Loader -->


    <div id="wrapper">

        <!-- top navbar -->
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                </div>

                <div class="navbar-brand ps-2">
                   
                </div>

                <div class="d-flex flex-grow-1 align-items-center">
                   
                   
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Sidbar menu -->
        <?php include('navbar.php') ?>

        <div id="main-content">
            <div class="container-fluid">

                <div class="block-header py-lg-4 py-3">
                    <div class="row g-3">
                       
                        <div class="col-md-6 col-sm-12 text-md-end">
                           
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    
                   
                    <div class="col-lg-12 col-md-12">
                        <div class="card mb-3">
                            <form action="" method="post">
                                <div class="card-header">
                                    <h6 class="card-title">Gestion des comptes administrateur</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <h6 class="mt-4">Veuillez appuyer l'interrupteur en laisant la couleur verte active devant les différents droits que vous souhaitez attribuer à cet utilisateur</h6>
                                            <?php
                                            $roles_compte_admin_liste=$sql->roles_compte_admin_liste();
                                            while ($roles_compte_admin_listes = $roles_compte_admin_liste->fetch()) {
                                                echo('
                                                    <div class="form-check form-switch">
                                                    <input class="form-check-input"' . ( in_array($roles_compte_admin_listes['id'], $configurations_compte_admin) ? 'checked' : null ) . ' name="role_compte_admin[]" value="'.$roles_compte_admin_listes['id'].'" type="checkbox" id="flexSwitchCheckDefault" />
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">'.$roles_compte_admin_listes['intituler'].'</label>
                                                    </div>
                                                ');
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">

                                <input type="submit" name="compte_admin" class="btn btn-primary" value="Attribuer"> 
                                </div>
                            </form></br>
                        </div>
                    </div>
                   

                    <div class="col-lg-12 col-md-12">
                        
                    </div>
                    <div class="col-lg-6 col-md-12">
                        
                    </div>
                    <div class="col-lg-6 col-md-12">
                        
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
<!-- core js file -->
<script src="assets/bundles/libscripts.bundle.js"></script>

<!-- page js file -->
<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>