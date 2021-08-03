<?php


/* Provera email-a u bazu */
function email_exist($email){

    $sql = "SELECT id FROM telekom.user WHERE mail =  $email ";
    $result = query($sql);
    
    if(row_count($result) > 0){
        return true;
    } else {
        return false;
    }
}

/* Provera username-a u bazu */
function user_exist($username){

    $sql = "SELECT id FROM telekom.user WHERE username =  $username ";
    $result = query($sql);
    if(row_count($result) > 0){
        return true;
    } else {
        return false;
    }
}

/* Provera da li su password i confirm password isti */
function password_match($password, $confirm_password){
    if ($password == $confirm_password){
        return true;
    }else {
        return false;
    }
}
 /* Register function */
 function register_user($username, $email, $password, $confirm_password, $user_class){

    $username = escape($username);
    $email    = escape($email);
    $password = escape($password);
    //$date = date('Y-m-d H:i:s');
    //$headers  = "From: acasax@gmail.com"; //no-replay@virtualcoworking.com

    if (email_exist($email)){
        $user_class->returnJSON("ERROR","Korisnik sa emailom:  $email  već postoji.");
        return false;
    } else if (user_exist($username)){
        $user_class->returnJSON("ERROR","Korisnik sa  korisničkim imenom: " . $username . " već postoji.");
        return false;
    } else if (password_match($password, $confirm_password)){
        $user_class->returnJSON("ERROR","Niste dobro potvrdili šifru.");
        return false;
    } else {
        $password        = md5($password);
        $validation_code = md5($username);
        //$subject          = "Aktivacioni link za V-cow";
        //$reg_link         = "http://localhost/v-cow/activate.php";
        //$msg              = "Aktivaciju Vašeg naloga če te izvršiti klikom na link $reg_link?email=$email&code=$validation_code";

        $register_sql = "INSERT INTO user (username, mail, password) VALUE ($username, $email, '$password')";
        query($register_sql);
  
        confirm($register_sql);


        //send_email($email, $subject, $msg, $headers); // proveravaj jer vraca t/f zbog poruke i dodaj na domen za proveru slanja mejla

        $user_class->returnJSON("OK","Uspešno ste se registrovali.");
                                      /*Lik za potvrdu registracije 
                                      Vam je poslat na e-mail."*/

        return true;
    }

 }

 function login_user($username, $password, $user_class){
    //dodaj za tipove korisnika

        $username = escape($username);
        $password = escape($password);

        $login_sql = "SELECT id, password FROM admins WHERE username = $username AND password =  $password ";
        $result = query($login_sql);
        if(row_count($result) != 0){
            
                /*
                if ($remember == 1){
                    unset($_COOKIE['email']);
                    setcookie("email", $email, time() + 86400, '/');
                    $_SESSION["email"] = $email;
                    $_COOKIE["email"] = $email;
                }
                $_SESSION['user_login'] = true;
                */
                session_start();

                $_SESSION["logged"] = true;

                $user_class->returnJSON("OK","Uspešno ste se prijavili!");
                
    
        }else {
            $user_class->returnJSON("ERROR","Korisnik sa ovim username-om ne postoji!");
        }
    }
?>