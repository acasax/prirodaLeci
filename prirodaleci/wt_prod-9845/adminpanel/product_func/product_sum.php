<?php

include "../../services/dbconnection.php";
include "functions_product.php";

$query = '';
$output = array();
$query .= "SELECT DISTINCT item FROM storage_items";




if (isset($_POST["search"]["value"])) {

    $query .= ' WHERE storage_items.item LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR storage_items.quantity LIKE "%' .$_POST["search"]["value"].'%" ';
}
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
    $query1 = 'SELECT SUM(quantity) AS ProductSum FROM storage_items WHERE item = "' . $row["item"] . '"';
    $stmt_sum = $db->prepare($query1);
    $stmt_sum->execute();
    $result1 = $stmt_sum->fetch();

    $sub_array = array();
    //$img = "php_assets/blog_functions/image/" . $row["image_name"];
    //$sub_array[] = $row["id"];
    $sub_array[] = $row["item"];
    $sub_array[] = $result1["ProductSum"];

    //$sub_array[] = '<button type="button" name="update" id="' . $row["id"] . '" class="w-100 h-100 update" style="background: none; border: none; margin: auto; text-align: center;" title="Change" ><i class="fas fa-user-edit"></i></button>';
    //$sub_array[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="w-100 h-100 delete" style="background: none; border: none; margin: auto; text-align: center;" title="Delete" ><i class="fas fa-trash"></i></button>';
    $data[] = $sub_array;
}

$output = array(
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records($db),
    "data" => $data
);

echo json_encode($output);