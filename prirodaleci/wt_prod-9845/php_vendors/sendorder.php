<?php
include "class.user.php";
include "../services/dbconnection.php";
$user_class = new USER();



///if (isset($_REQUEST['recaptcha_response'])) {

// Build POST request:
///$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
///$recaptcha_secret = '6LcA-KoaAAAAAO90EfGBnbOFvRyxtcgkFmFmzjrs';
///$recaptcha_response = $_POST['recaptcha_response'];

// Make and decode POST request:
///$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
// echo $recaptcha;
///$recaptcha = json_decode($recaptcha);


// Take action based on the score returned:
///if ($recaptcha->score >= 0.5) {
if (isset($_REQUEST['name']) && isset($_REQUEST['lastname']) && isset($_REQUEST['phone']) && isset($_REQUEST['address']) && isset($_REQUEST['email']) && isset($_REQUEST['address'])) {

    $email_to = "info@resivoje.com";
    $email_subject = "test";


    $name       = $_POST['name'];
    $lastname      = $_POST['lastname'];
    $phone      = $_POST['phone'];
    $email    = $_POST['email'];
    $address    = $_POST['address'];
    $zip    = $_POST['zip'];
    $napomena   = $_POST['napomena'];
    $nonbak    = $_POST['nonbak'];
    $postkovid    = $_POST['postkovid'];

    //upisivanje u bazu


    $date = date('Y-m-d H:i:s');
    $status = 'Neposlato';
    //$headers  = "From: acasax@gmail.com"; //no-replay@virtualcoworking.com
    //$subject          = "Aktivacioni link za V-cow";
    //$reg_link         = "http://localhost/v-cow/activate.php";
    //$msg              = "Aktivaciju Vašeg naloga če te izvršiti klikom na link $reg_link?email=$email&code=$validation_code";



    $db->beginTransaction();

    

    try{
        $order_select = "SELECT id FROM `orders` ORDER BY id DESC LIMIT 1";

        $stm1 = $db->prepare($order_select);
        $stm1->execute();
        $order_id = $stm1->fetch();

        $object1 = (object) [
            'name' => 'nonbak',
            'quantity' => $nonbak,
          ];

        $object2 = (object) [
            'name' => 'postkovid',
            'quantity' => $postkovid,
          ];

        
          $a = $item->name;
          $b = $item->quantity;

        $storage_sql = "SELECT quantity FROM storage_items WHERE item = '   $a'";

        $order_sql = "INSERT INTO orders (name, lastname, address, zip, time, phone, email, note) VALUE ('$name', '$lastname', '$address', '$zip', '$date', '$phone', '$email', '$napomena')";

        $stm = $db->prepare($order_sql);
        $stm->execute();



        
        //$order_id = $db->lastInsertId();
        

        $array = array($object1, $object2);

        foreach($array as $item){

            $id = $order_id["id"];
            if($b != 0)
            {
            
            

            $items_insert = "INSERT INTO order_items (fk_order, item, quantity) VALUE ($id, '$a', $b)";
            $stm2 = $db->prepare($items_insert);
            $stm2->execute();
            
            }
            
        }
        
        $db->commit();
    }catch(mysqli_sql_exception $e) {
        $db->rollBack();
        throw $e; // $e cuvam u bazu - greska. (datum, naziv, id).
        $user_class->returnJSON("ERROR","Message not sent. Please try again.");
        return;
    }finally{
        $user_class->returnJSON("OK","Message sent.");
        return;
    }
    
       
    
        
    
} else {
    //echo "nije sve setovanoi";
    $user_class->returnJSON("ERROR","FIll all required fields.");
    return;
}



    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message = "Ime: " . clean_string($name) . "\n";
    $email_message .= "Prezime: " . clean_string($lastname) . "\n";
    $email_message .= "Telefon: " . clean_string($phone) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Napomena:" . clean_string($napomena) . "\n";
    /*
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    if (@mail($email_to, $email_subject, $email_message, $headers)) {
        $user_class->returnJSON("OK", "Message sent.");
        return;
    } else {
        $user_class->returnJSON("ERROR", "Message not sent. Please try again.");
        return;
    };*/
        ///} else {
            // echo "error with recaptcha";
            /// $user_class->returnJSON("ERROR",
            ///  "Problem with recaptcha");
            ///return;
        ///}
    ///} else {
        //echo "error with recaptcha_response";
         ///$user_class->returnJSON("ERROR",
         ///"Problem with recaptcha_response");
        ///return;
    ///}
