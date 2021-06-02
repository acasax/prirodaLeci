  
<?php

include "../../services/dbconnection.php";
include "functions.php";

if (isset($_POST["order_id"])) {
    $output = array();
    $query1 = "SELECT * FROM orders JOIN order_items ON orders.id = order_items.fk_order WHERE order_items.id = " . $_POST["order_id"] . "";
    $stmt = $db->prepare($query1);
    $stmt->execute();
    $result = $stmt->fetch();
    $output["id"] = $_POST["order_id"];
    $output["order_NAME"] = $result["name"];
    $output["order_LASTNAME"] = $result["lastname"];
    $output["order_ADDRESS"] = $result["address"];
    $output["order_ZIP"] = $result["zip"];
    $output["order_TIME"] = $result["time"];
    $output["order_PHONE"] = $result["phone"];
    $output["order_EMAIL"] = $result["email"];
    $output["order_STATUS"] = $result["status"];
    $output["order_NOTE"] = $result["note"];
    $output["order_ITEM"] = $result["item"];
    $output["order_QUANTITY"] = $result["quantity"];

    echo json_encode($output);
}