
<?php


if(isset($_GET['bloquer']) && !empty($_GET['bloquer']) ){
        $_SESSION['id_bloque']=$_GET['bloquer'];
        $bloquer_compte= $sql->bloquer_compte_rh(0,  $_SESSION['id_bloque']);
        if($bloquer_compte){
            echo "<script>alert(\"Ce compte a été bloqué  .\")</script>";  
        }else {
            echo "<script>alert(\"Erreur .\")</script>"; 
        }
    }

    if(isset($_GET['debloquer']) && !empty($_GET['debloquer']) ){
        $_SESSION['id_debloque']=$_GET['debloquer'];
        $debloquer= $sql->debloquer_compte_rh(1, $_SESSION['id_debloque']);
        if($debloquer){
            echo "<script>alert(\"Ce compte a été débloqué  .\")</script>";  
        }else {
            echo "<script>alert(\"Erreur .\")</script>"; 
        }
    }
    
    //Ajout
    if(isset($_POST['add'])){
      

        //Vérification nom
    if (!empty($_POST['username'])) {
    if (trim($_POST['username']=="")) {
        $error_username= "Caractères alpha numérique uniquement";
        echo "<script>alert(\"$error_username\")</script>"; 
    }else{
    $username=htmlspecialchars($_POST['username']);
    
    }
    
    }else{
    $error_username= "Le champ username est obligatioire";
    echo "<script>alert(\"$error_username\")</script>"; 
    } 
    
    

    if (!empty($_POST['password'])) {
        if (trim($_POST['password']=="")) {
        $error_password="Mot de passe obligatoire";
        echo "<script>alert(\"$error_password\")</script>"; 
        }else{
        $password=htmlspecialchars($_POST['password']);
        
        }
        
        }else{
            $error_password= "Le champ password est obligatioire";
            echo "<script>alert(\"$error_password\")</script>"; 
        }   


        if(empty($username) || empty($password)){
          
              } else {
                 $ajout_compte_utilisateur = $sql->compte_utilisateur_ajouter($username, $password);
                    if($ajout_compte_utilisateur){
                    echo "<script>alert(\"Un nouveau compte vient d'être ajouter .\")</script>";  
                     }
            }
      
    }

    //Fin ajout

    //Modification
      if(isset($_POST['update'])){
      

        //Vérification nom  d'utilisateur
if (!empty($_POST['username'])) {
    if (trim($_POST['username']=="")) {
        $error_username= "Caractères alpha numérique uniquement";
    }else{
    $username=htmlspecialchars($_POST['username']);
    
    }
    
    }else{
    $error_username= "Le champ username est obligatioire";
    } 
    
    
    //Vérification mot de passe
    if (!empty($_POST['password'])) {
        if (trim($_POST['password']=="")) {
        $error_password="Mot de passe obligatoire";
        }else{
        $password=htmlspecialchars($_POST['password']);
        
        }
        
        }else{
            $error_password= "Le champ password est obligatioire";
        }   

        
    if(empty($username) || empty($password)){
        echo "Tout les champs doivent être remplis";
            }else{
                $compte_utilisateur_modifier = $sql->compte_utilisateur_modifier($username, $password,$_SESSION['mod']);
        if($compte_utilisateur_modifier){
            echo "<script>alert(\"Le compte a été modifié avec success .\")</script>"; 
              echo '<script>window.location.href="gestion_compte.php"</script>';  
          
        }else {
              }
      }
    }
      
    ?>