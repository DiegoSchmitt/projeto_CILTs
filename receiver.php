<?php
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    if($_SESSION['type'] == 1){
        header('Location:admin.php');
    }
    if($_SESSION['type'] == 0){
        header('Location:users.php');
    }
}
else{
    header('Location:login.php');
}

?>