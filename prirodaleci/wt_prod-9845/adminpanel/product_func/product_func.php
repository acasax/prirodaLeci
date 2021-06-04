<?php

include "../../services/dbconnection.php";
include "functions_product.php";
require_once '../../services/class.user.php';
$user_class = new USER();
if (isset($_POST["operation"])) {

    if ($_POST["operation"] === "Dodaj") {
        $name1 = $_POST['product_name'];
        $description1 = $_POST['product_description'];

        $db->beginTransaction();

        try{
            $insert_query = "INSERT INTO item (name, description) VALUES ('$name1', '$description1')";
            $stmt2 = $db->prepare($insert_query);

            $stmt2->execute();

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
    }


    if ($_POST["operation"] === "Promeni") {
        $id = $_POST['id'];
        $name = $_POST['product_name'];
        $description = $_POST['product_description'];

       
        $db->beginTransaction();

        try{
            $query = "UPDATE item SET name = '$name', description = '$description' WHERE id = $id";

            $stm = $db->prepare($query);
            $stm->execute();

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

    } 

    }?>