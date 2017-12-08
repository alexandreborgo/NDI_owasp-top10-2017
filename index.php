<?php

    ini_set('session.use_trans_sid', true);
    session_start();

    include 'header.php';

    if(isset($_GET['pg']) && !empty($_GET['pg'])) {

       switch($_GET['pg']) {
           case 'home':
               $pg = 'home';
               break;
           case 'inj':
               $pg = 'injection';
               break;
           case 'xss':
               $pg = 'xss';
               break;
           case 'csrf':
               $pg = 'csrf';
               break;
           case 'ba':
               $pg = 'brokenauth';
               break;
           default:
               $pg = 'home';
               break;
       }

       require $pg.'.php';
    }

    include 'footer.php';





