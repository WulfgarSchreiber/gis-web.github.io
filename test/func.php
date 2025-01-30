<?php

session_start();
    //Declarated Variable
    define('DB_HOST','localhost');
    define('DB_NAME','deka');
    define('DB_USER','root');
    define('DB_PASS','');

    //Try to Connected
    try{
        $db=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
        //echo "Database Connected";
    }catch(PDOException $e){
        echo "Database Not Connected -> ".$e->getMessage();
        exit;
    }

?>

