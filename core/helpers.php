<?php
    //regresa la url del proyecto
    function url_full() {
        return URL_FULL;
    }

    function publicDocs() {
        return URL_FULL. '/public/';
    }

    function libraries(){
        return BASE_URL. '/libraries/';
    }

    

    //funcion para formatear
    function dd($data){
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('<br/>Tipo: ');
        $format .= print_r(var_dump($data));
        $format .= print_r('</pre>');
        return $format;
    }

    //funcion para llamar ventanas modales del proyecto
    function getModal(string $nameModal, $data){
        $viewModal = '/views/_templates/modals/'.$nameModal.'.php';
        require_once $viewModal;
    }

    //funcion convertir string de DB a array
    function toArr($cadena){
        $cadena= str_replace("[{", "",$cadena);
        $cadena= str_replace("}]", "",$cadena);
        $cadena= str_replace("},{", "|",$cadena);
        $cadena= str_replace('"', '',$cadena);
        $dataArr = explode('|',$cadena);
        return $dataArr;
    }

    //funcion que quita caracteres especiales para url
    function removeChars($cadena){
        //Reemplazamos la A y a
        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
            );
     
            //Reemplazamos la E y e
            $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena );
     
            //Reemplazamos la I y i
            $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena );
     
            //Reemplazamos la O y o
            $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena );
     
            //Reemplazamos la U y u
            $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena );
     
            //Reemplazamos la N, n, C y c
            $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç',',','.',';',':','&'),
            array('N', 'n', 'C', 'c','','','','','y'),
            $cadena
            );
            return $cadena;

    }

    

    //formato para valores moenetarios
    function formatMoney($cantidad){
        $cantidad = number_format($cantidad, 2, SPD, SPM);
        return $cantidad;
    }

    function uploadPhoto($data, $name){
        $root= 'public/img/catalogo/';                    //regresamos al directorio raiz   //Creamos la carpeta pruebas en la carpeta raiz si no existe
        if(!is_dir($root)){
            mkdir($root);
        }
        $host =$root.$name;
        //Si el archivo no existe se crea en la carpeta
        if(!file_exists($host)){
            $url=move_uploaded_file($data, $host);                                     
        }  
        return $url; 
    }

    function uploadSectionPhoto(array $data, string $name){
        $root= 'public/img/icons/sections/';                    //regresamos al directorio raiz   //Creamos la carpeta pruebas en la carpeta raiz si no existe
        if(!is_dir($root)){
            mkdir($root);
        }
        $host =$root.$name;
        //Si el archivo no existe se crea en la carpeta
        if(!file_exists($host)){
            $url=move_uploaded_file($data['tmp_name'], $host);                                     
        }
        else{
            //si existe se sobrescribe
            $url=move_uploaded_file($data['tmp_name'], $host);  
        } 
        return $url; 
    }

    function uploadBannerPhoto(array $data, string $name){
        $root= 'public/img/banners/';                    //regresamos al directorio raiz   //Creamos la carpeta pruebas en la carpeta raiz si no existe
        if(!is_dir($root)){
            mkdir($root);
        }
        $host =$root.$name;
        //Si el archivo no existe se crea en la carpeta
        if(!file_exists($host)){
            $url=move_uploaded_file($data['tmp_name'], $host);                                     
        }
        else{
            //si existe se sobrescribe
            $url=move_uploaded_file($data['tmp_name'], $host);  
        } 
        return $url; 
    }

    function dropFile(string $name){
        //solo se borra la img si es diferente de la img por defecto
        if($name!='001.jpg'){
            unlink('public/img/catalogo/'.$name); 
        }
    }

    function dropFileSection(string $name){
        unlink('public/img/icons/sections/'.$name);
    }

    function destroyCarrito($sesionCarrito){
        unset($sesionCarrito);
    }

    function meses(){
        $meses =['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        return $meses;
    }

    #enviar correos por medio de funcion mail de php
    function sendMail($data, $template){
        $asunto = $data['asunto'];
        $destinatario = $data['email'];
        $empresa = EMPRESAEMAIL;  //nombre empresa
        $remitente = SENDMAILER;   //correo que envia el mensaje
        //$emailCopia = !empty($datas['copia']) ? $data['copia'] : '';
        //Envio de correo
        $de = "MIME-Version: 1.0\r\n";
        $de .= "Content-type: text/html; charset=UTF-8\r\n";
        $de .= "From: {$empresa} <{$remitente}>\r\n";
        //$de.= 'Bcc: '.$emailCopia.'>\\r\\n';
        ob_start();
        require_once('views/_templates/emails/'.$template.'.php');
        $mensaje = ob_get_clean();
        $send = mail($destinatario, $asunto, $mensaje, $de);
        return $send;
    }
    #Funcion que permite enviar correo mediante phpmailer
    function enviarMail($data, $template){
        require 'libraries/PHPMailer/src/Exception.php';
        require 'libraries/PHPMailer/src/PHPMailer.php';
        require 'libraries/PHPMailer/src/SMTP.php';

        try{
            //variables para config
            $hetacombeMail="";
            $pass="";
            //$myHost="smtp.gmail.com";
            $myHost="smtp.office365.com";
            //$myHost="mail.hetacombe.com.mx";
            $puerto= "587";
            $deParte="Asistente Hetacombe";
            $SMTP_Auth=true;
            $seguridad="STARTTLS";
            ob_start();
            require_once('views/_templates/emails/'.$template.'.php');
            $mensaje = ob_get_clean();
            
            //config
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug=0;
            //$mail->Debugoutput = 'html';
            $mail->Host = $myHost;
            $mail->Port = $puerto; 
            $mail->SMTPAuth =$SMTP_Auth;      
            $mail->SMTPSecure =$seguridad;  
            $mail->Username = $hetacombeMail;
            $mail->Password =$pass;  
            //receptores y remitentes
            $mail->setFrom($HetacombeMail, $deParte);
            $mail->addAddress($data['email'], $data['nombre']);
            //contenido de lemail
            $mail->isHTML(true);
            $mail->Subject =$data['asunto'];
            $mail->Body = $mensaje;
            
            if ($mail->send())
                return true;
                else
                return false;
        }catch(Exception $e){
        }
    }

?>