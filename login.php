<?php
require('model.php');
$sql = new model;

if (isset($_POST['login'])) {
    # code...
    $login = $sql->login($_POST['username'], $_POST['password']);
    while ($logins = $login->fetch()) {
        # code...
        $_SESSION['id'] = $logins['id'];
        $_SESSION['username'] = $logins['username'];
        $_SESSION['password'] = $logins['password'];
        $_SESSION['visible'] = $logins['visible'];
        if ($_SESSION['visible'] == 1) {
            # code...
            $in_out="Connexion";
            $historique_connexion = $sql->historique_connexion($in_out, $_SESSION['id']);
            if ($historique_connexion) {
                # code...
                header('location:index.php');
            }
            
        }else {
            echo "<script>alert(\"Votre compte a été desactivé. Veuillez conctatez le service d'administration  .\")</script>";  
        }
        
    }

    
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lucid HR & Project Admin Dashboard Template with Bootstrap 5x">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="assets/images/paper-plane.png" type="image/x-icon">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

<div id="layout" class="theme-green">    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="d-flex h100vh align-items-center auth-main w-100">
            <div class="auth-box">
                <div class="top mb-4">
                    <div class="logo">
                    <img src="assets/images/logo-blak.svg" width="200px" height="88px" alt="">                    

                    </div>
                </div>
                <div class="card shadow p-lg-4">
                    <div class="card-header">
                        <p class="fs-5 mb-0">Connectez-vous à votre compte</p>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-floating mb-1">
                                <input type="text" name ="username" class="form-control" placeholder="Gladys">
                                <label>Nom d'utilisateur</label>
                            </div>
                            <div class="form-floating">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                                <label>Mot de passe</label>
                            </div>
                            <div class="form-check my-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Gardez ma session active
                                </label>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100 px-3 py-2">Connexion</button>
                        </form>
                        <div class="mt-3 pt-3 border-top">
                            <!-- <p class="mb-1"><a href="page-forgot-password.html"><i class="fa fa-lock me-2"></i>Forgot password?</a></p> -->
                            <span>Mot de passe oublié ? Contactez l'administrateur système </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</div>
</body>
</html>