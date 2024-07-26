<?php
session_start();

class model{
        private function access(){
      
            $db=new PDO('mysql:host=localhost;dbname=kilian','root','');
          return $db;
        }

 /**
 * 
 *  Roles,Gestion users,historique de connexion
 * 
 */
         public function login($username, $password){
            $db=$this->access();
            try{
                
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $requestLogin=$db->prepare('SELECT * FROM admin WHERE username=? AND password =?');
                $requestLogin->execute(array($username, $password));
                return $requestLogin;
                }
                catch(PDOException $e){

                echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        } 
        //historique connexion
        public function historique_connexion($in_out, $admin){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $historique_connexion=$db->prepare('INSERT INTO historique_connexion (in_out, admin) VALUES(?,?)');
            $historique_connexion->execute(array($in_out, $admin));
            return $historique_connexion;
            }
            catch(PDOException $e){

            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
        public function historique_connexion_liste(){
            $db=$this->access();
            try{
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $historique_connexion_liste=$db->prepare('SELECT admin.id, admin.username, in_out, historique_connexion.date FROM historique_connexion, admin WHERE historique_connexion.admin = admin.id ');
                $historique_connexion_liste->execute(array());
                return $historique_connexion_liste;
            }
            catch(PDOException $e){
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }

        public function admin_liste(){
            $db=$this->access();
            try{
                
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $admin_liste=$db->prepare('SELECT * FROM admin');
                $admin_liste->execute(array());
                return $admin_liste;
                }
                catch(PDOException $e){

                echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }

       
        
        public function role_compte_admin_add($admin, $compte_admin){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $role_compte_admin_add=$db->prepare('INSERT INTO gestion_roles (admin, compte_admin) VALUES(?,?)');
            $role_compte_admin_add->execute(array($admin, $compte_admin));
            return $role_compte_admin_add;
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
        
        public function role_compte_admin_user_liste($admin){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $role_compte_admin_user_liste=$db->prepare('SELECT compte_admin FROM gestion_roles WHERE admin=?');
            $role_compte_admin_user_liste->execute(array($admin));
            return $role_compte_admin_user_liste;
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
        
        public function role_compte_admin_user_del($admin){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $role_compte_admin_user_del=$db->prepare('DELETE FROM gestion_roles WHERE admin=? AND compte_admin IS NOT NULL');
            $role_compte_admin_user_del->execute(array($admin));
            return $role_compte_admin_user_del;
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
      


 
        
        
         //liste du module compte_admin
        public function roles_compte_admin_liste(){
            $db=$this->access();
           try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $roles_compte_admin_liste=$db->prepare('SELECT * FROM roles_compte_admin WHERE visible = ?');
            $roles_compte_admin_liste->execute(array(1));
            return $roles_compte_admin_liste;
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
        
      

                  //utilisateur
      
  public function utilisateur(){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $utilisateur=$db->prepare('SELECT admin.username, admin.date, admin.id, admin.password, admin.visible FROM admin');
    $utilisateur->execute(array());
    return $utilisateur;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

    
        public function un_utilisateur($id){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $un_utilisateur=$db->prepare('SELECT admin.username, admin.date, admin.id, admin.password, admin.visible FROM admin WHERE admin.id = ?');
           $un_utilisateur->execute(array($id));
            return $un_utilisateur;
            }
            catch(PDOException $e){

            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }



        public function compte_utilisateur_ajouter($username,$password){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //unicité
            $id_unique=$db->prepare('SELECT * FROM admin WHERE username=?');
            $id_unique->execute(array($username));
        
            $result_id_unique = $id_unique->rowCount();
            if($result_id_unique == 0){
                //ajout du compte
                $ajout_compte_utilisateur = $db->prepare('INSERT INTO admin (username, password) VALUES(?,?)');
                $ajout_compte_utilisateur->execute(array($username,$password));
                return $ajout_compte_utilisateur;
            }else {
                # code...
                echo "<script>alert(\"Ce nom d'utilisateur existe déjà  .\")</script>";  
            }
            
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }



     public function compte_utilisateur_modifier($username,$password,$id){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //unicité
    $id_unique=$db->prepare('SELECT * FROM admin WHERE username=? AND id <> ?');
    $id_unique->execute(array($username,$id));

    $result_id_unique = $id_unique->rowCount();
    if($result_id_unique == 0){
        //modification du compte
        $compte_utilisateur_modifier = $db->prepare('UPDATE admin SET username=?, password=? WHERE id=?');
        $compte_utilisateur_modifier->execute(array($username,$password,$id));
        return $compte_utilisateur_modifier;
    }else {
        # code...
        echo "<script>alert(\"Ce nom d'utilisateur existe déjà  .\")</script>";  
    }
    
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

  
    //Bloquer un compte
    public function bloquer_compte_rh($actif,$slug){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $bloquer_compte=$db->prepare('UPDATE admin SET visible=? WHERE id=?');
    $bloquer_compte->execute(array($actif, $slug));
    return $bloquer_compte;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

    //Debloquer un compte
    public function debloquer_compte_rh($actif,$slug){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $debloquer_compte=$db->prepare('UPDATE admin SET visible=? WHERE id=?');
    $debloquer_compte->execute(array($actif, $slug));
    return $debloquer_compte;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

// fin utilisateur

// modification de profil
public function profil_modifier($username,$new_password,$id){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //unicité
    $id_unique=$db->prepare('SELECT * FROM admin WHERE username=? AND id <> ?');
    $id_unique->execute(array($username,$id));

    $result_id_unique = $id_unique->rowCount();
    if($result_id_unique == 0){
        $profil_modifier = $db->prepare('UPDATE admin SET username=?, password=? WHERE id=?');
        $profil_modifier->execute(array($username,$new_password,$id));
        return $profil_modifier;
    }else {
        # code...
        echo "<script>alert(\"Ce nom d'utilisateur existe déjà  .\")</script>";  
    }
    
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

public function un_profil($id){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $un_profil=$db->prepare('SELECT admin.username, admin.date, admin.id, admin.password, admin.visible FROM admin WHERE admin.id = ?');
   $un_profil->execute(array($id));
    return $un_profil;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}


public function verif_mdp($new_password,$id){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $verif_mdp=$db->prepare('SELECT admin.* FROM admin WHERE password=? AND id = ?');
   $verif_mdp->execute(array($new_password,$id));
    return $verif_mdp;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}



public function getRolesAdministrateur($id){
    $db=$this->access();
    try{
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $getRolesAdministrateur=$db->prepare('SELECT roles_compte_admin.intituler, roles_compte_admin.page FROM roles_compte_admin WHERE roles_compte_admin.id IN (SELECT compte_admin FROM gestion_roles WHERE admin = ? ) ');
        $getRolesAdministrateur->execute(array($id));
        return $getRolesAdministrateur;
        }
        catch(PDOException $e){

        echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
  }
   
}
?>
