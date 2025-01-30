<?php

if (isset($_SESSION['admin'])){
    
} else {
    header('location:login.php');
}

?>