<?php
    /*SE DECLARAN LAS VARIABLES GLOBALES DE DIRECCION
    ESTAS CAMBIARAN DEPENDIENDO LA URL QUE SE REQUIERA COMO DIRECCIONM PRINCIPAL
    */
    const EMPRESA = '.:Xpress PHP:.';

    const BASE_URL = '/';
    const URL_FULL = 'http://xpressphp.test';
    
    //constante para mandar a llamar el header
    const CAB = 'views/_templates/header.php';
    const FOOT = 'views/_templates/footer.php';

    //constante para mandar a llamar el header
    const PANEL_CAB = 'views/_templates/panel/header_panel.php';
    const PANEL_FOOT = 'views/_templates/panel/footer_panel.php';
    const PANEL_NAV = 'views/_templates/panel/nav_panel.php';
    const PANEL_SIDE = 'views/_templates/panel/side.php';

    //zona horaria
    date_default_timezone_set('America/Mexico_City');

    //constantes para la conexion a la DB en local
    const DB_HOST = '127.0.0.1';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'ligaff';
    const DB_CHARSET = 'utf8';
    //const DB_CHARSET = 'charset=utf8';
    
    //constantes para la conexion a la DB en produccion
    //const DB_HOST = 'localhost';
    //const DB_USER = '';
    //const DB_PASS = '';
    //const DB_NAME = '';
    //const DB_CHARSET = 'utf8';

    //formas de contacto empresa
    const DIRECCION ='';
    const TELEFONO =  '';
    //cuenta general de la empressa
    //const EMAIL = 'hetacombe.2021@hotmail.com';
    const EMAIL = '';
    //cuenta que enviara correos al usuario
    const SENDMAILER ='';
    //cuenta de email de contacto
    const EMAILCONTAC ='';
    const FACEBOOK = 'https://www.fb.com/';
    const INSTAGRAM = 'https://www.instagram.com';

    //variables para el los meta para compartir productos en redes sociales
    const EMPMETA = '';
    const DESCRIPCION = '';
    const SHAREHASH = '';

    //delimitadores decimal y millar ej 24,1989.00
    const SPD ='.';
    const SPM =',';
    //simbolo de moneda
    const SMONEY ='$'; 
    const MONEYMEX ='MXN';
    //precio por defecto
    const PRECIO = 219;
    //costo envio
    const ENVIO = 89;
    //si compra es mayor a 800 envio gratis
    const ENVIOGRATIS = 800;

    //info PMP
    const PUBLIC_KEY = '';
    const ACCESS_TOKEN = '';
   
    
    //encriptar id
    const KEY = '';
    const METHODENCRIPT ='AES-128-ECB';

    //encriptar id adress
    const KEY_ADDRESS = 'az';
    const ROL_ACCESS = 321;

    //productos para pagina Home
    const PZSHOME = 12;
    //productos por pagina para tienda
    const PZSTIENDA = 16;
    //productos por pagina para busqueda
    const PZSBUSQUEDA = 12;
    //constante para el inicio de scroll infinito usado en account/favorites account/compras y tienda/section
    const INITIALSCROLL = 0;
    //productos por scroll compras
    const SCROLLCOMPRAS = 2;
    //productos por pagina para busqueda
    const SCROLLFAVS = 3;
    //PRODUCTOS POR COLLECCION
    const SCROLLCOLLECTIONS = 8;

    const DEV ='';

?>