<?php
    require_once("includes/common.inc.php");
    require_once("includes/database.inc.php");
    $page_file = (isset($_GET["page"])?$_GET["page"]:"home") . ".php";
?>

<!DOCTYPE html>
<html>

<header>

    <!-- Meta Information about Page -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Materialize CSS and Graphics Imports -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet'>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-42257735-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-42257735-3');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <!-- Basic Information About Page -->
    <style>
        nav { background-color: #000000; }
        .page-footer { background-color: #000000; }
        body { font-family: 'Aldrich'; font-size: 14px; }
        .dark-primary-color    { background: #000000; } 
        .default-primary-color { background: #212121; } 
        .light-primary-color   { background: #9E9E9E; } 
        .accent-color          { background: #D50000; } 
        .accent-light          { background: #FF1744; } 
        .accent-tint           { background: #DD3333; } 
        .accent-shade          { background: #CF0606; } 
        .accent-button         { background: #D50000; box-shadow: 0px 1px 0px #DD3333 inset, 0px -1px 0px #CF0606 inset, 0px 0px 5px rgba(0, 0, 0, 0.5); }
    </style>
    <title>Cyberpunk Help Page Generator</title>
    <!-- Basic Information About Page -->

</header>

<body>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-database.js"></script>

    <script>
       // Your web app's Firebase configuration
       var firebaseConfig = {
         apiKey: "AIzaSyD3LUVINjIt9XAHvMZyXojbqGv-EXrKeUk",
         authDomain: "cyberpunk-database.firebaseapp.com",
         databaseURL: "https://cyberpunk-database.firebaseio.com",
         projectId: "cyberpunk-database",
         storageBucket: "cyberpunk-database.appspot.com",
         messagingSenderId: "492371389033",
         appId: "1:492371389033:web:03dc0c1000b49c6b5350f8"
       };
       // Initialize Firebase
       firebase.initializeApp(firebaseConfig);
    </script>

    <!-- HEADER -->
    <nav>
        <div class="nav-wrapper">
            <a href="." class="brand-logo">&nbsp;&nbsp;Cyberpunk Help Page Generator</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="?page=blog">Novedades</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="characters">Personajes<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="rules">Reglas<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="equipment">Equipo<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="running">Netrunning<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="complements">Suplementos<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>

    <ul id="characters" class="dropdown-content">
        <li><a href="?page=players">Jugadores</a></li>
        <li><a href="?page=npc">No Jugadores</a></li>
    </ul>        
    <ul id="rules" class="dropdown-content">
        <li><a href="?page=roles">Roles</a></li>
        <li><a href="?page=skills">Habilidades</a></li>
        <li><a href="?page=lifepast">Vida Pasada</a></li>
        <li><a href="?page=lifecost">Costos</a></li>
    </ul>        
    <ul id="equipment" class="dropdown-content">
        <li><a href="?page=equipment&class=Armas">Armas</a></li>
        <li><a href="?page=equipment&class=Blindaje">Blindaje</a></li>
        <li><a href="?page=equipment&class=Ciberequipo">Ciberequipo</a></li>
        <li><a href="?page=equipment&class=Chips">Chipware</a></li>
        <li><a href="?page=equipment&class=Ropa">Vestimenta</a></li>
        <li><a href="?page=equipment&class=Equipo">Equipo</a></li>
        <li><a href="?page=equipment&class=Vehiculos">Vehículos</a></li>
        <li><a href="?page=equipment&class=Drogas">Drogas</a></li>
    </ul>        
    <ul id="running" class="dropdown-content">
        <li><a href="?page=equipment&class=Terminales">Terminales</a></li>
        <li><a href="?page=equipment&class=Perifericos">Periféricos</a></li>
        <li><a href="?page=equipment&class=Programas">Software</a></li>
        <li><a href="?page=datafortress">Fortalezas</a></li>
    </ul>        
    <ul id="complements" class="dropdown-content">
        <li><a href="https://drive.google.com/file/d/1d6tPpfJDF9v28cGOOsG2EzyheMFUsINa/view?usp=sharing" target="_blank">Plantilla PDF</a></li>
        <li><a href="https://drive.google.com/drive/folders/0B9dJWyUnySwmYkZmbzhXX3BIaU0?usp=sharing" target="_blank">Documentos</a></li>
        <li class="divider"></li>
        <li><a href="https://docs.google.com/document/d/1_Y31F8AXFE2vDgMcW3scp05SL1aOEIvBkyRFfT51n1I/edit?usp=sharing" target="_blank">Darkpunk 2026</a></li>
        <!-- li class="divider"></li>
        <li><a href="lite" target="_blank">Sitio Lite</a></li>
        <li><a href="includes/export_full.php?format=json">Json Firebase</a></li -->
    </ul>        

    <!-- BODY -->
    <div class="container">
        <?php call_page($page_file); ?>
    </div>

    <!-- FOOTER -->
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l8 m8 s8">
                    <img src="images/favicon.png" height="80" />
                    <h5 class="white-text">Cyberpunk 2020 Help Page</h5>
                    <p class="grey-text text-lighten-4">Apoyo en línea para las partidas de Cyberpunk 2020</p>
                </div>
                <div class="col l4 m4 s4 right-align">
                    <img class="responsive-img" src="images/cyberpunk.gif" />
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Andrés Muñoz Órdenes © 2020 Copyright
                <a class="grey-text text-lighten-4 right" href="mailto:andmunoz@gmail.com">Enviar comentarios</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        M.AutoInit();
    </script>

</body>

</html>
