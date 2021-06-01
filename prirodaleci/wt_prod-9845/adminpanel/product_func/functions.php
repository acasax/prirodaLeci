<?php

function get_total_all_records($db)
{
    $stmt = $db->prepare("
    SELECT * FROM orders INNER JOIN order_items ON orders.id = order_items.fk_order
    ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $stmt->rowCount();
}