<?php
    $host = 'localhost';
    $dbname = 'prirodaleci';
    $username = 'root';
    $password = '';


    try
    {
     $db = new PDO('mysql:host=localhost; dbname=prirodaleci;    charset=utf8', 'root', ''); 
       $db->setAttribute(PDO::ATTR_ERRMODE,    PDO::ERRMODE_EXCEPTION); 
       }
             catch (PDOException $ex)
   {
       echo ("Cannot connect to the database!");
   die();
       }
   ?>