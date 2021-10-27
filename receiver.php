<?php
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    if($_SESSION['type'] == 1){
        header('Location:pages/admin.php');
    }
    if($_SESSION['type'] == 0){
        header('Location:pages/users.php');
    }
}
else{
    header('Location: pages/login.php');
}

?>