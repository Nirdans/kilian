<?php

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
    
    
    //Vérification ancien mot de passe
    if (!empty($_POST['password'])) {
        if (trim($_POST['password']=="")) {
        $error_password="Ancien mot de passe obligatoire";
        }else{
        $password=htmlspecialchars($_POST['password']);
        
        }
        
        }else{
            $error_password= "Le champ ancien mot de passe est obligatioire";
        }   

         //Vérification nouveau mot de passe
    if (!empty($_POST['new_password'])) {
        if (trim($_POST['new_password']=="")) {
        $error_new_password="Nouveau mot de passe obligatoire";
        }else{
        $new_password=htmlspecialchars($_POST['new_password']);
        
        }
        
        }else{
            $error_new_password= "Le champ nouveau mot de passe est obligatioire";
        }   

    


    if(!empty($username) && empty($password) && empty($new_password)){
        $profil_modifier = $sql->profil_modifier($username, $_SESSION['password'],$_SESSION['id']);
        if($profil_modifier){
            $_SESSION['username']=$username;
            echo "<script>alert(\"Le profil a été modifié avec success .\")</script>"; 
              echo '<script>window.location.href="acceuil.php"</script>';  
          
        }
   }

        if (!empty($username) && !empty($password) && !empty($new_password)) {
           $verif_mdp = $sql->verif_mdp($password,$_SESSION['id']);
           $nbre=$verif_mdp->rowCount();
           if ($nbre>0) {
            $profil_modifier = $sql->profil_modifier($username, $new_password,$_SESSION['id']);
            if($profil_modifier){
                $_SESSION['username']=$username;
                echo "<script>alert(\"Le profil a été modifié avec success .\")</script>"; 
                  echo '<script>window.location.href="index.php"</script>';  
            
           }else{
            
            }
           }else {
            echo "<script>alert(\"Ancien mot de passe incorrect .\")</script>"; 
        }
        }
    }
      
    ?>