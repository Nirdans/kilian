<?php

    include('model.php');
    $sql=new model;
    if (empty($_SESSION['id'])) {
        # code...
        header('location:login.php');
    }
    require('verification_compte.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Gestion utilisateurs</title>
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
                            <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Gestion des utlisateurs</h2>
                           
                        </div>
                      
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title">Liste des utilisateurs</h6>
                                <ul class="header-dropdown">
                                    <li>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addEmployee">Ajouter un nouvel utilisateur</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <table id="employee_List" class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>


                                            <th>#ID</th>
                                            <th>Nom d'utilisateur</th>
                                            <th>Date de création du compte</th>
                                          
                                            <th>Etat du compte</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                                                 $i = 1;

                                         $utilisateur = $sql -> utilisateur();
                                         while ($utilisateurs = $utilisateur->fetch()) {
                                             # code...
                                             $role=$utilisateurs['visible'];
                                             if ($role == 1) {
                                                 # code...
                                                 $etat="Compte Actif";
                                             }else {
                                                 $etat="Compte désactivé";
                                             }
                                             echo('

                                                <tr>
                                                <td>'.$i++.'</td>
                                                <td><h6 class="mb-0">'.$utilisateurs['username'].'</h6></td>
                                                    <td><h6 class="mb-0">'.$utilisateurs['date'].'</h6></td>
                                                   
                                                    <td><h6 class="mb-0">'.$etat.'</h6></td>
                                                    <td> 
                                                    ');
                                         if($utilisateurs['visible']=="1"){
                                          echo ' <a href="?bloquer='.$utilisateurs['id'].'"  class="btn btn-danger" ><i class="fa fa-lock"></i></a>
                                                 ';
                                        }else{
                                           echo ' <a  href="?debloquer='.$utilisateurs['id'].'" class="btn btn-success" ><i class="fa fa-unlock"></i></a>
                                                    ';
                                         
                                        }
echo('


                                                  
                                                  <a href="modifier_compte.php?mod='.$utilisateurs['id'].'" class="btn btn-info" ><i class="fa fa-edit"></i></a>
                                                
                                                  
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

    <!-- Default Size -->
    <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployee" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Assistant de création compte</h5>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <form action="" method="post">
                        
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
                            </div>
                            </br>
                            <div class="col-md-12">
                                <input type="text" name="password" class="form-control" placeholder="Mot de passe">
                            </div>
                             </br>
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add" class="btn btn-primary">Ajouter</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer l'assistant</button>
                    </div>
                </form>
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