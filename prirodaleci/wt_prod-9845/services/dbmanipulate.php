<?php

//Osnovne funkcije koje frse direktnu manipulaciju sa podacima iz baze
include "dbconnection.php";

function query($query)
{
    global $db;
    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->beginTransaction();
        $query = $db->prepare($query);
        $query->execute();
        $db->commit();
    } catch (Exception $e) {
        $db->rollBack();
        echo "Failed: " . $e->getMessage();
    } finally {
        return $query;
    }
}


    function escape($string)
    {
        global $db;
        return $db->quote($string);
    }

    function fetch_array($result)
    {
        global $db;
        $row = $result->fetch();
        return $row;
    }

    function confirm($result)
    {
        global $db;
        if (!$result) {
            die("FAILED" . mysqli_error($db));
        }
    }

    function row_count($result)
    {
        return $result->rowCount();
    }