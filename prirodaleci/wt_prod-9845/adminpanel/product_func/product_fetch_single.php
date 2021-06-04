<?php

include "../../services/dbconnection.php";
include "functions_product.php";

if (isset($_POST["product_id"])) {
    $output = array();
    $query1 = "SELECT * FROM item WHERE item.id = " . $_POST["product_id"] . "";
    $stmt = $db->prepare($query1);
    $stmt->execute();
    $result = $stmt->fetch();
    $output["id"] = $result["id"];
    $output["product_NAME"] = $result["name"];
    $output["product_DESCRIPTION"] = $result["description"];


    echo json_encode($output);
}