<!-- THE HEADER -->

<header>
    <?php if(Auth::user()): ?>


    <div class="container-fluid custom-container">
        <div class="row no_row row-header">
            <div class="brand-be">
                <a href="<?php echo e(URL::to('site/home')); ?>" ><img src="/img/logo.png" alt="logo" class="be_logo"></a>
                </a>
            </div>




            <div class="login-header-block">
                <div class="login_block">   

                    <!--                                                           
                    <a class="notofications-popup" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="noto-count">23</span>
                    </a>
                    <div class="noto-popup notofications-block">
                        <div class="noto-label">Notification</div>
                        <div class="noto-body">

                            <div class="noto-entry">
                                <div class="noto-content clearfix">
                                    <div class="noto-img">  
                                        <a href="#">
                                            <img src="/img/logo.png" alt="" class="be-ava-comment">
                                        </a>
                                    </div>
                                    <div class="noto-text">
                                        <div class="noto-text-top">
                                            <span class="noto-name"><a href="#">Ravi Sah</a></span>
                                            <span class="noto-date"><i class="fa fa-clock-o"></i> May 27, 2015</span>
                                        </div>
                                        <a href="#" class="noto-message">Demande de rendez-vous</a>
                                    </div>
                                </div>
                            </div>  

                            <div class="noto-entry">
                                <div class="noto-content clearfix">
                                    <div class="noto-img">  
                                        <a href="#">
                                            <img src="/img/logo.png" alt="" class="be-ava-comment">
                                        </a>
                                    </div>
                                    <div class="noto-text">
                                        <div class="noto-text-top">
                                            <span class="noto-name"><a href="#">Ravi Sah</a></span>
                                            <span class="noto-date"><i class="fa fa-clock-o"></i> May 27, 2015</span>
                                        </div>
                                        <a href="#" class="noto-message">Changement de rendez-vous</a>
                                    </div>
                                </div>
                            </div>                                   
                                                
                        </div>                          
                    </div>
                    -->


                    <div class="be-drop-down login-user-down">
                        <img class="login-user" height="60" src="<?php echo e((Auth::user()->avatar != null ? Auth::user()->avatar : '/img/ava_10.jpg' )); ?>" alt="">
                        <span class="be-dropdown-content"><span>Bonjour, <?php echo e(Auth::user()->prenom); ?> <?php echo e(Auth::user()->nom); ?></span> </span>
                        <ul class="drop-down-list">
                            <li><a class="btn color-1-transparent size-2 " href="<?php echo e(URL::to('site/profil')); ?>" width="100%"><i class="fa fa-address-book" aria-hidden="true"></i> Voir mon profil</a></li>
                            <li><a class="btn color-1-transparent size-2" href="<?php echo e(URL::to('deconnexion')); ?>"  width="100%"><i class="fa fa-power-off" aria-hidden="true"></i> Se deconnecter</a></li>
                        </ul>                      


                    </div>                                                                      
                </div>  
            </div>


            <div class="header-menu-block">
            <button class="cmn-toggle-switch cmn-toggle-switch__htx"><span></span></button>
            <ul class="header-menu" id="one">
                <li><a href="<?php echo e(URL::to('site/home')); ?>" >Accueil</a></li>   
                <li><a href="<?php echo e(URL::to('site/blog')); ?>" >Blog</a></li>                 
                <li><a href="<?php echo e(URL::to('site/contact')); ?>" >Contact</a></li>
                                 
            </ul>
        </div>   
        </div>
    </div>
   


    
    <?php else: ?>

    <div class="container-fluid custom-container">
        <div class="row no_row row-header">
            <div class="brand-be">

               <a href="<?php echo e(URL::to('site/home')); ?>" ><img src="/img/logo.png" alt="logo" class="be_logo"></a>
                
            </div>

            <div class="header-menu-block">
                <button class="cmn-toggle-switch cmn-toggle-switch__htx"><span></span></button>
                <ul class="header-menu" id="one">
                    <li><a href="<?php echo e(URL::to('site/home')); ?>" >Accueil</a></li>   
                    <li><a href="<?php echo e(URL::to('site/blog')); ?>" >Blog</a></li> 
                    <li><a href="<?php echo e(URL::to('site/contact')); ?>" >Contact</a></li>
                                     
                </ul>
            </div>
            <div class="login-header-block">
                <div class="login_block">
                    <a class="btn-login btn color-1 size-2 hover-2" href="#"><i class="fa fa-user"></i>
                    Connexion</a>
                </div>  
            </div>
        </div>
    </div>




    <?php endif; ?>
</header>