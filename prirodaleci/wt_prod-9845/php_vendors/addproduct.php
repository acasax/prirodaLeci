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
if (isset($_REQUEST['nonbak']) || isset($_REQUEST['postkovid'])) {

    $email_to = "info@resivoje.com";
    $email_subject = "Dodavanje u magacin";

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



    try {
        $object1 = (object) [
            'name' => 'nonbak',
            'quantity' => $nonbak,
        ];

        $object2 = (object) [
            'name' => 'postkovid',
            'quantity' => $postkovid,
        ];

        $array = array($object1, $object2);

        foreach ($array as $item) {
            $a = $item->name;
            $b = $item->quantity;
            if ($b != 0) {



                $items_insert = "INSERT INTO storage_items ( item, quantity) VALUE ('$a', $b)";
                $stm2 = $db->prepare($items_insert);
                $stm2->execute();

                function clean_string($string)
                {
                    $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                    return str_replace($bad, "", $string);
                }

                $email_message = "Proizvod: " . clean_string($a) . "\n";
                $email_message .= "Količina: " . clean_string($b) . "\n";

                $headers = 'Dodavanje u magacin. ' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    @mail($email_to, $email_subject, $email_message, $headers);
                /*if (@mail($email_to, $email_subject, $email_message, $headers)) {
                    $user_class->returnJSON("OK", "Message sent.");
                    return;
                } else {
                    $user_class->returnJSON("ERROR", "Message not sent. Please try again.");
                    return;
                };*/
            }
        }

        $db->commit();
    } catch (mysqli_sql_exception $e) {
        $db->rollBack();
        throw $e; // $e cuvam u bazu - greska. (datum, naziv, id).
        $user_class->returnJSON("ERROR", "Message not sent. Please try again.");
        return;
    } finally {
        $user_class->returnJSON("OK", "Proizvod je dodat u skladište.");
        return;
    }
} else {
    //echo "nije sve setovanoi";
    $user_class->returnJSON("ERROR", "FIll all required fields.");
    return;
}



    
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
