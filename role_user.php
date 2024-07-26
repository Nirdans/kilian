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
    <title>Gestion des rôles d'utilisateurs</title>
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
                            <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Gestion des rôles d'utilisateurs</h2>
                            
                        </div>
                        
                    </div>

                </div>
            <div class="row clearfix">
                <div class="col-lg-12">

                     <form action="role_user.php" enctype="multipart/form-data" method="post">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="card">
                                
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title">Liste des utilisateurs du système</h6>
                                <ul class="header-dropdown">
                                    <li>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <table id="employee_List" class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>

                                            <th>#ID</th>
                                            
                                            <th>Nom d'utilisateur</th>
                                            <th>Droits d'accès</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $admin_liste = $sql -> admin_liste();
                                         while ($admin_listes = $admin_liste->fetch()) {
                                            
                                             echo('


      

                                                <tr>
                                                    <td>'.$admin_listes['id'].'</td>
                                                    <td><h6 class="mb-0">'.$admin_listes['username'].'</h6></td>
                                                   
                                                    <td>
                                                    <a href="droits.php?utm='.$admin_listes['id'].'" ><i class="fa fa-law"></i>Attribuer les droits</a>
                                                        
                                                        
                                                        
                                                    </td>
                                                </tr>
                                             ');
                                         }
                                         ?>
                                    </tbody>
                                </table>
                            </div>
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