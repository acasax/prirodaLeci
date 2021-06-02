<?php

include "../../services/dbconnection.php";
include "functions.php";
require_once '../../services/class.user.php';
$user_class = new USER();
if (isset($_POST["operation"])) {


    if ($_POST["operation"] === "Promeni") {
        $id = $_POST['id'];
        $name = $_POST['order_NAME'];
        $lastname = $_POST['order_LASTNAME'];
        $address = $_POST['order_ADDRESS'];
        $zip = $_POST['order_ZIP'];
        $time = $_POST['order_TIME'];
        $phone = $_POST['order_PHONE'];
        $email = $_POST['order_EMAIL'];
        $status = $_POST['order_STATUS'];
        $item = $_POST['order_ITEM'];
        $quantity = $_POST['order_QUANTITY'];

       
        $db->beginTransaction();

        try{
            $select_query = "SELECT * FROM orders JOIN order_items ON orders.id = order_items.fk_order WHERE order_items.id = " . $_POST["id"] . "";
            $stmt1 = $db->prepare($select_query);
    
            $stmt1->execute();
            $result1 = $stmt1->fetch();

            $id1 = $result1["fk_order"];
           

            $query = "UPDATE orders SET name = '$name', lastname = '$lastname', address = '$address', zip = $zip, time = '$time', 
            phone = $phone, status = '$status' WHERE orders.id = $id1";

            $stm = $db->prepare($query);
            $stm->execute();

            $query1 = "UPDATE order_items SET item = '$item', quantity = $quantity WHERE fk_order = $id1 AND id = $id";

            $stm2 = $db->prepare($query1);
            $stm2->execute();


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

    } }?>