<?php
    require_once('config/config.php');
    require_once('core/helpers.php');
    //require_once('core/verifyForms.php');

    $url = empty($_GET['uri']) ?  '/' : $_GET['uri'];
    $arrUrl = explode("/", $url);

    //se redirige a la seccion de uso de API
    if($arrUrl[0]==='API'){
        header('location: API/index.php');
    }

    require_once('core/autoload.php');
    require_once('routes/web.php');
    