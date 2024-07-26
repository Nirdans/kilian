<?php

    include('model.php');
    $sql=new model;
    if (empty($_SESSION['id'])) {
        # code...
        header('location:login.php');
    }
    			//historique connexion
			$in_out="Deconnexion";
			$historique_connexion=$sql->historique_connexion($in_out, $_SESSION['id'], date('Y-m-d'));
			if ($historique_connexion) {
                # code...
                session_destroy();
                session_unset();
				header('location:login.php');
			}
            ?>
