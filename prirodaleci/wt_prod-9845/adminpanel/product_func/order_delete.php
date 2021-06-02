<?php

include "../../services/dbconnection.php";
include "functions.php";
require_once '../../php_vendors/class.user.php';
$user_class = new USER();
if (isset($_POST["order_id"])) {

    $db->beginTransaction();

    try {

    $select_query = "SELECT * FROM orders JOIN order_items ON orders.id = order_items.fk_order WHERE order_items.id = " . $_POST["order_id"] . "";
    $stmt1 = $db->prepare($select_query);
    
    $stmt1->execute();
    $result1 = $stmt1->fetch();

    $id = $result1["fk_order"];

    $query = "DELETE FROM orders WHERE id = $id";
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