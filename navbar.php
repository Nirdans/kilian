<nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                </div>
            </div>
</nav>
<div id="left-sidebar" class="sidebar">
            <div class="user-account p-3 mb-3">
                <div class="d-flex mb-3 pb-3 border-bottom align-items-center">
                    <img src="assets/images/paper-plane.png" class="avatar lg rounded me-3" alt="User Profile Picture">
                    <div class="dropdown flex-grow-1">
                        <span class="d-block">Bienvenue</span>
                        <a href="#" class="dropdown-toggle user-name" data-bs-toggle="dropdown"><strong><?php echo($_SESSION['username']); ?></strong></a>
                        <ul class="dropdown-menu p-2 shadow-sm">
                            <li class="divider"></li>
                            <li><a href="modifier_profil.php"><i class="fa fa-user me-2"></i>Profil</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off me-2"></i>Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
              
            </div>
            <!-- nav tab: menu list -->
            <ul class="nav nav-tabs text-center mb-2" role="tablist">
                <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab" href="#hr_menu" role="tab">MENU</a></li>
                <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab" href="#setting_menu" role="tab"><i class="fa fa-cog"></i></a></li>
            </ul>

            <!-- nav tab: content -->
            <div class="tab-content px-0">
                <div class="tab-pane fade show active" id="hr_menu">
                    <nav class="sidebar-nav">
                       
                    <ul class="main-menu metismenu list-unstyled">
                           
                           
                           <li>
                                <a href="#" class="has-arrow"><i class="fa fa-cog"></i><span>Compte administrateur</span></a>
                                <ul class="list-unstyled">
                                    <?php
                                        $getRolesAdministrateur=$sql->getRolesAdministrateur($_SESSION['id']);
                                        while ($getRolesAdministrateurs = $getRolesAdministrateur->fetch()) {
                                            # code...
                                            echo('
                                                <li><a href="'.$getRolesAdministrateurs['page'].'">'.$getRolesAdministrateurs['intituler'].'</a></li>
                                            ');
                                        }
                                    ?> 
                                </ul>
                            </li>
                           
                         
                          
                            
                            

                        </ul>
                    </li>
                    </nav>
                </div>
                <div class="tab-pane fade" id="setting_menu" role="tabpanel" >
                    <div class="px-3">
                    <h6>Personnalisez la couleur</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple" class="mb-2"><div class="purple"></div><span>Purple</span></li>
                        <li data-theme="blue" class="mb-2"><div class="blue"></div><span>Blue</span></li>
                        <li data-theme="cyan" class="mb-2"><div class="cyan"></div><span>Cyan</span></li>
                        <li data-theme="green" class="mb-2"><div class="green"></div><span>Green</span></li>
                        <li data-theme="orange" class="active mb-2"><div class="orange"></div><span>Orange</span></li>
                        <li data-theme="blush" class="mb-2"><div class="blush"></div><span>Blush</span></li>
                    </ul>
                    <hr>
                    <h6>Préferences</h6>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-1">
                            <div class="form-check form-switch theme-switch">
                                <input class="form-check-input" type="checkbox" id="theme-switch">
                                <label class="form-check-label" for="theme-switch">Utilisez le mode sombre !</label>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-1">
                            <div class="form-check form-switch theme-high-contrast">
                                <input class="form-check-input" type="checkbox" id="theme-high-contrast">
                                <label class="form-check-label" for="theme-high-contrast">Autoriser les Contrast élevés</label>
                            </div>
                        </li>
                    </ul>
                    <hr>
                </div>
                </div>
            </div>
        </div>