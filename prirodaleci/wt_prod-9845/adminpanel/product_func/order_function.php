<?php

include "../../services/dbconnection.php";
include "functions.php";

$query = '';
$output = array();
$query .= "SELECT * FROM orders INNER JOIN order_items ON orders.id = order_items.fk_order";

/*
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE orders.name LIKE "%' . $_POST["search"]["value"] . '%" OR orders.lastname LIKE "%' . $_POST["search"]["value"] . '%" OR orders.address LIKE "%' . $_POST["search"]["value"] . '%" orders.zip LIKE "%' . $_POST["search"]["value"] . '%" 
    orders.time LIKE "%' . $_POST["search"]["value"] . '%" orders.phone LIKE "%' . $_POST["search"]["value"] . '%" orders.email LIKE "%' . $_POST["search"]["value"] . '%" orders.status LIKE "%' . $_POST["search"]["value"] . '%" orders.note LIKE "%' . $_POST["search"]["value"] . '%" 
    orders.item LIKE "%' . $_POST["search"]["value"] . '%" orders.quantity LIKE "%' . $_POST["search"]["value"] . '%" ';
}*/

/*
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY blog.id DESC ';
}*/


$stmt = $db->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll();

$data = array();

$filtered_rows = $stmt->rowCount();


foreach ($result as $row) {

    $sub_array = array();
    //$img = "php_assets/blog_functions/image/" . $row["image_name"];
    $sub_array[] = $row["id"];
    $sub_array[] = $row["name"];
    $sub_array[] = $row["lastname"];
    $sub_array[] = $row["address"];
    $sub_array[] = $row["zip"];
    $sub_array[] = $row["time"];
    $sub_array[] = $row["phone"];
    $sub_array[] = $row["email"];
    $sub_array[] = $row["status"];
    $sub_array[] = $row["note"];
    $sub_array[] = $row["item"];
    $sub_array[] = $row["quantity"];
    $sub_array[] = '<button type="button" name="update" id="' . $row["id"] . '" class="w-100 h-100 update" style="background: none; border: none; margin: auto; text-align: center;" title="Change" ><i class="fas fa-user-edit"></i></button>';
    $sub_array[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="w-100 h-100 delete" style="background: none; border: none; margin: auto; text-align: center;" title="Delete" ><i class="fas fa-trash"></i></button>';
    $data[] = $sub_array;
}

$output = array(
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records($db),
    "data" => $data
);

echo json_encode($output);