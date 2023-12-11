<?php
    #verificar maximo de  caracteres de cadena
    function maxLenght($max, $string){
        if(strlen(trim($string)) > $max){
            return true;            
        }
        else {
            return false;
        }

    }

    #verificar maximo de  caracteres de cadena
    function minLenght($min, $string){
        if(strlen(trim($string)) < $min){
            return true;            
        }
        else {
            return false;
        }

    }

    #Verificar que se esta igresando una direccion de correo valida
    function isMail ($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;            
        }
        else {
            return false;
        }
    }

    #Verificar que password coincidan
    function matchPass ($password, $password_confimation){
        if($password === $password_confimation){
            return true;            
        }
        else {
            return false;
        }
    }

    #hashear password
    function hashPass($password){
        //codificar la contraseña
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        return $hashedPass;
    }

    #verificar password
    function checkPass($password, $passDB){
        $checkPass = password_verify($password, $passDB);
        return $checkPass;
    }

    //genera un password de 10 caracteres
    function passGenerator($length = 10) {
        $pass ='';
        $longPass = $length;
        $cadena = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789-_#';
        $longitudCadena = strlen($cadena);

        for($i=1; $i<=$longPass; $i++){
            $pos = rand(0, $longitudCadena-1);
            $pass .= substr($cadena, $pos,1);
        }
        return $pass;
    }

    //genera token
    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1. '-'. $r2. '-'. $r3. '-'. $r4;
        return $token;
    }

    //Elimina excesos de espacios entre palabras
    function strClean($strTxt){
        $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strTxt);
        $string = trim($string);  //elimina espacios en blanco al inicio y al final
        $string = stripslashes($string);  // elimina \invertidas
        $string = str_ireplace('<script>', '', $string);
        $string = str_ireplace('</script>', '', $string);
        $string = str_ireplace('<script src>', '', $string);
        $string = str_ireplace('<script type=>', '', $string);
        $string = str_ireplace('SELECT * FROM', '', $string);
        $string = str_ireplace('DELETE FROM', '', $string);
        $string = str_ireplace('INSERT INTO', '', $string);
        $string = str_ireplace('SELECT COUNT(*) FROM', '', $string);
        $string = str_ireplace('DROP TABLE', '', $string);
        $string = str_ireplace("OR '1'='1'", '', $string);
        $string = str_ireplace('OR "1"="1"', '', $string);
        $string = str_ireplace('OR ´1´=´1´', '', $string);
        $string = str_ireplace('OR `1`=`1`', '', $string);
        $string = str_ireplace('is NULL; --', '', $string);
        $string = str_ireplace('is NULL; --', '', $string);
        $string = str_ireplace("LIKE '", '', $string);
        $string = str_ireplace('LIKE "', '', $string);
        $string = str_ireplace('LIKE ´', '', $string);
        $string = str_ireplace("OR 'a'='a'", '', $string);
        $string = str_ireplace('OR "a"="a"', '', $string);
        $string = str_ireplace('OR ´a´=´a´', '', $string);
        $string = str_ireplace('OR `a`=`a`', '', $string);
        $string = str_ireplace('--', '', $string);
        $string = str_ireplace('^', '', $string);
        $string = str_ireplace('[', '', $string);
        $string = str_ireplace(']', '', $string);
        $string = str_ireplace('==', '', $string);
        return $string;
    }


