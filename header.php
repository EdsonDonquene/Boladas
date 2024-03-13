<?php
include("includes/config/config.php");
//require 'includes/config/config.php';
include("includes/classes/User.php");
include("includes/classes/Main.php");

$user =  new User($con);
$functions = new Main($con);



$notification_btn = "";
$userloggedin = "";
$userfullname = "";
$mobile_not_alert = "";
$header= "";
$os = "";
$disable = "";
$auth = ""; 
$loader = "";
$seller="";
$verified = "";
$verified_icon = "";
$verified_disable = "";
$verified_disable_message = "";
$install_btn = "";
$install_btn2 = "";


?>

    <script>
    
    
    </script>

<?php



$loader = '
            <div class="loader_overlay" id="loader_overlay">
                <div class="loader_bg card" id="loader">
                    <div class="preloader-wrapper big active" >
                        <div class="spinner-layer spinner-blue-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                    <p class="center" id="progressText" style="font-size:45%; font-style:italic; font-weight:300;margin-top:5px " >Porfavor aguarde...</p>
                </div>
            </div>    
';

$success = '
            <div class="success_overlay" id="success_overlay">
                <div class="loader_bg card" id="loader_bg">
                    <img rel="preload" src="resources/img/icons/check.svg" alt="check">
                </div>
            </div>    
';

$post_description_panel = '
            <div class="description_overlay" id="description_overlay">
                <div class="description_background">
                    <div class="div_close_description">
                        <button class="btn waves-effect waves-light" onclick="closeDescription()" ><i class="material-icons">close</i> </button>
                    </div>
                    <div class="description_content" id="description_content">
                        <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div> 
            </div>

';

$install_btn = '
<div class="" id="install_button" hidden>
    Instalar App 
    <i class="right material-icons">devices</i>
</div>
';

$install_btn2 = '
<div class="install_btn2" id="install_button2" hidden>
    Instalar App 
    <i class="right material-icons">devices</i>
</div>
';

if (isset($_SESSION['uname'])) 
{
    if(isset($_GET['auth']))
    {
        $auth = $_GET['auth'].$_SESSION['id']; 
        if($auth == "AUTHENTICATED".$_SESSION['id'] )
        {
            $userloggedin = $_SESSION['uname'];
            $full_name = $user->getFullname($userloggedin);
            $seller = $user->getIsSeller($userloggedin);
            $icon = $user->getIcon($userloggedin);
            $disable = "";
            $verified = $user->getVerified($userloggedin);

           

            if($verified == 'yes')
            {
                $verified_disable = "";
                $verified_disable_message = "";
                $verified_icon = "<i class='material-icons verified_icon right'>verified</i>";
            }
            else
            {
                $verified_disable = "disabled";
                $verified_disable_message = "Premium";
                $verified_icon ="";
            }
            

            if($seller == 'no')
                $title = "Cliente";
            else
                $title = "Vendedor";

            $header='  
                    <div class="navbar-fixed">
                        <nav class="app_navbar">
                            <div class="nav-wrapper nav_wrapper">
                                <div class="container_logo valign-wrapper">
                                    <a href="#" class="brand-logo"><img rel="preload" src="resources/img/logos/eb_logo.svg" alt="app logo"></a>
                                    <a href="#" data-target="container_mobile_menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                                    
                                                                               
                           

                                </div>
                                <ul id="nav-mobile" class="right hide-on-med-and-down">

                                    <li class="li_logout_btn">
                                    '.$install_btn.' 
                                    </li>
                
                                    <li class="li_logout_btn"  >
                                        <div class="logout_btn" href="#!" id="notification_btn" onclick="notificationDrop(), notificationLoad()" >
                                            Notificações 
                                            <i class="right material-icons">notifications</i>
                                        </div>
                                        <div class="notification_dropdown" id="notification_dropdown">
                                           
                                        </div>
                                                                            
                                    </li>
                                    
                                    <li class="li_logout_btn" >
                                        <div class="logout_btn waves-effect waves-light hide-on-med-and-down" onclick="userDrop()"  id="logout_btn" >
                                        '. $full_name .'
                                            <img rel="preload" class="circle" src="resources/img/logos/logo-04.svg">
                                        </div>
                                        <div class="container_user_dropdown" id="user_dropdown">
                                            <a href="dashboard.php?u='.$userloggedin.'" class="waves-effect userlinks" >Dashboard <i class="right material-icons">dashboard</i> </a>
                                            <a href="collection.php?u='.$userloggedin.'" 
                                            class="waves-effect userlinks" >Coleção <i class="right material-icons">bookmark</i> </a>
                                            <a href="profile.php?u='.$userloggedin.'" class="waves-effect userlinks" >Perfil <i class="right material-icons">manage_accounts</i> </a>
                                            <a href="settings.php?u='.$userloggedin.'" class="waves-effect userlinks" >Definições <i class="right material-icons">settings</i> </a>
                                            <a class="waves-effect userlinks modal-trigger" href="#logout-modal" >Sair <i class="right material-icons">logout</i> </a>

                                            <div id="logout-modal" class="modal logout_modal">
                                                <div class="modal-content">
                                                <div class="center">
                                                    <img rel="preload" class="center" src="resources/img/icons/logout.svg" alt="logout img">
                                                </div>
                                                <p class="center" >Tem certeza que quer sair?</p>
                                                <div class="center">
                                                    <a class="modal-close center btn waves-effect waves-light">Cancelar</a>
                                                    <a href="logout.php" class="center btn waves-effect waves-light">Sair <i class="right material-icons">logout</i></a>
                                                </div>
                                               
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </nav>
                    </div>
                    <ul class="sidenav hide-on-large-only hide-on-extra-large-only" id="container_mobile_menu">
                        
                        <a class="sidenav-close container_close_nav" href="#!">
                            <i class="right material-icons">close</i>
                        </a>
                        <div class="container_user_sidenav">
                            <li>
                                <div class="container_user_img">
                                    <img rel="preload" class="left circle" src="resources/img/logos/eb_logo.svg" alt="user profile">
                                </div>
                               
                                
                            </li>
                            <li>
                                <a href="#!" class="user_name waves-effect">
                                    <span>'.$full_name.' </span> <span>'.$verified_icon.'</span>
                                </a>
                                <a href="logout.php" class="waves-effect btn" >Sair <i class="material-icons right" style="color: white !important">logout</i></a>
                            </li>

                            <l></l>

                            <li><a class="subheader">Navegação</a></li>
                            <li><a  class="waves-effect" href="about.php">Notificações <i class="right material-icons">notifications</i></a></li>
                            <li><a  class="waves-effect" href="about.php">Coleção <i class="right material-icons">bookmark</i></a></li>
                            <li><a  class="waves-effect" href="about.php">Dashboard <i class="right material-icons">dashboard</i></a></li>
                            <li><a  class="waves-effect" href="about.php">Definições <i class="right material-icons">settings</i></a></li>
                            <li><a  class="waves-effect" href="about.php">Sobre <i class="right material-icons">info</i></a></li>
                            
                            <li>
                                <div class="container_ads">
                                
                                </div>
                            </li>
                            <li class="container_copyright_info">
                            '.$install_btn2.'
                                <div class="container_copyright center">
                                    <p>Dakipraki copyright&copy, 2024 <br>All rights reserved</p>
                                </div>
                                <div class="container_social_icons">
                                    <ion-icon name="logo-linkedin"></ion-icon>
                                    <ion-icon name="logo-instagram"></ion-icon>
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                </div>
                            </li>
                        </div>
                    
                    
                    </ul>
                    
                    <ul class="sidenav_filters" id="container_mobile_filters">
                        <div class="">

                        </div>
                    </ul>
                ';

        }
        else
        {
            session_destroy();
            header("Location: index.php?info=NOTAUTHETICATEDACC");
            $disable = "disabled";
        }
        
    }
    else
    {
        session_destroy();
        header("Location: index.php?info=NOTAUTHETICATEDACC");
        $disable = "disabled";


    }
   

    


    
} 
else
{  
    $disable = "disabled";
    $header='  
    <div class="navbar-fixed">
        <nav class="app_navbar">
            <div class="nav-wrapper nav_wrapper">
                <div class="container_logo valign-wrapper">
                    <a href="#" class="brand-logo"><img rel="preload" src="resources/img/logos/eb_logo.svg" alt="app logo"></a>
                    <a href="#" data-target="container_mobile_menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                </div>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="li_logout_btn" >
                        '.$install_btn.'
                    </li>
                    <li><a href="about.php">Sobre</a></li>
                    <li><a href="login.php">Entrar</a></li>
                    <li><a class="waves-effect waves-light btn" id="id_register" href="register.php">Registar <i class="material-icons right">edit</i></a></li>
                </ul>
            
            </div>
        </nav>
    </div>
    <ul class="sidenav hide-on-large-only hide-on-extra-large-only" id="container_mobile_menu">
        <div class="container_sidenav_top">
            <li>
            <div class="container_logo_nav center">
                <a href="index.php" class="brand-logo"><img rel="preload" src="resources/img/logos/eb_logo.svg" alt="app logo"></a>
            </div>
            </li>
           
            
            <li><a class="waves-effect waves-light btn" id="id_register" href="register.php"><i class="material-icons right">edit</i> Registar </a></li>
      
            
            <li><a  class="waves-effect" href="login.php">Entrar</a></li>
            <li><a  class="waves-effect" href="about.php">Sobre</a></li>

           
        </div>
        
        <div class="container_sidenav_bottom">
            <li>
                <div class="container_ads">
                
                </div>
            </li>
            <li>
            </li>
            <li class="container_social_info">
            '.$install_btn2.'
                <div class="container_copyright center">
                    <p>Dakipraki copyright&copy, 2024 <br>All rights reserved</p>
                </div>
                <div class="container_social_icons">
                    <ion-icon name="logo-linkedin"></ion-icon>
                    <ion-icon name="logo-instagram"></ion-icon>
                    <ion-icon name="logo-whatsapp"></ion-icon>
                </div>
            </li>
        </div>
       
       
    </ul>
  ';
}
?>

<!DOCTYPE html> 
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Dakipraki">
    <meta name="keywords" content="Mozambique, online, villa, house, rent, village, vilankulos, business, small business, shopping, renting, arrendar, comprar, vender, lugares">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar" content="#fff">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link type="text/css" rel="stylesheet" href="vendor/fonts/helvetica/stylesheet.css">
    <link type="text/css" rel="stylesheet" href="vendor/slick/css/slick.css">
    <link type="text/css" rel="stylesheet" href="vendor/slick/css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="resources/css/style.css">
    <link type="text/css" rel="stylesheet" href="resources/css/queries.css">
    <link type="text/css" rel="stylesheet" href="vendor/materialize/css/materialize.min.css">
 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="manifest" href="manifest.json">

    <!-- IOS SUPPORT -->
    <link rel="apple-touch-icon" href="resources/img/logos/icons/icon-06.png">
    
    <title>Dakipraki</title>


</head>
<body>
    <div class="container_offline" id="offline_container" hidden>
        <div class="container_offline_content">
            <div class="container_offline_img">
                <img src="resources/img/info/no_internet.svg" alt="offline img">
            </div>
            <div class="container_offline_action">
                <p>Oops! Parece que estas offline.</p>
                <p>Por favor aguarde, até conecção estar disponivel... </p>                
            </div>
        </div>
    </div>
