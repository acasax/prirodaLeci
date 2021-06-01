<?php

include "../../services/dbconnection.php";
include "functions.php";
require_once '../../php_vendors/class.user.php';
$user_class = new USER();
if (isset($_POST["blog_id"])) {
    $stmt = $db->prepare(
        "DELETE FROM orders WHERE id = :id"
    );
    $result = $stmt->execute(
        array(
            ':id' => $_POST["blog_id"]
        )
    );

    if (!empty($result)) {
        $user_class->returnJSON("OK", 'Successfully deleted image.');
        return;
    }
}