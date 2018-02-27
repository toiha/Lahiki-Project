<!-- THE FOOTER -->
<footer>

    <div class="footer-main">
        <div class="container-fluid custom-container">
            <div class="row">   
                <div class="col-md-3 col-xl-4">
                    <div class="footer-block">
                        <h1 class="footer-title">Qui sommes nous </h1>
                        <p>le site a pour but de mettre en relation les nouveaux étudiants mahorais avec les anciens ou actuels étudiants mahorais hors de Mayotte. Et ainsi permettre un meilleur accueil dans les villes d’études</p>
                        <ul class="soc_buttons">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-xl-2">
                    <div class="footer-block">
                        <h1 class="footer-title">Plan du site</h1>
                        <div class="row footer-list-footer">
                            <div class="col-md-6">

                                 

                            <ul class="link-list">
                                
                                <li><a href="{{ URL::to('site/home') }}" >Accueil</a></li>   
                                <li><a href="{{ URL::to('site/blog') }}" >Blog</a></li>
                                <li><a href="{{ URL::to('site/equipe') }}" >Equipe</a></li>
                                <li><a href="{{ URL::to('site/contact') }}" >Contact</a></li>




                            </ul></div>
                            
                        </div>
                    </div>
                </div>              
               
                <div class="col-md-3">
                    <div class="footer-block">
                        <h1 class="footer-title">Souscrivez à notre newsletter</h1>
                        <form action="./" class="subscribe-form">
                            <input type="text" placeholder="Votre mail" required>
                            <div class="submit-block">
                                <i class="fa fa-envelope-o"></i>
                                <input type="submit" value="">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container-fluid custom-container">
            <div class="col-md-12 footer-end clearfix">
                <div class="left">
                    <span class="copy">© 2017. tous droits réservés. <span class="white"><a href="{{ URL::to('site/home') }}" >Lahiki.Net</a></span></span>
                    
                </div>
               
            </div>          
        </div>
    </div>      
</footer>