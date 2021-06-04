<?php

include "../../services/dbconnection.php";
include "functions_product.php";
require_once '../../php_vendors/class.user.php';
$user_class = new USER();
if (isset($_POST["product_id"])) {

    $db->beginTransaction();

    try {

    $select_query = "SELECT * FROM item WHERE id = " . $_POST["product_id"] . "";
    $stmt1 = $db->prepare($select_query);
    
    $stmt1->execute();
    $result1 = $stmt1->fetch();

    $query = "DELETE FROM item WHERE id = " . $_POST["product_id"] . "";
    $stmt = $db->prepare($query);

    $result = $stmt->execute();

    $db->commit();
    }catch(mysqli_sql_exception $e) {
        $db->rollBack();
        throw $e; // $e cuvam u bazu - greska. (datum, naziv, id).
        $user_class->returnJSON("ERROR","Brisanje nije uspelo.");
        return;
    }finally{
        if (!empty($result)) {
            $user_class->returnJSON("OK", 'Uspešno ste izbrisali.');
            return;
        }
    }
}