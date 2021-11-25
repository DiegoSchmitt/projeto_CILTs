<?php  
    require "pages/header.php";
    require "users.class.php";
    $user = new Users;


if(isset($_POST['email']) && !empty($_POST['email'])){
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $type = addslashes($_POST['type']);
    $id = addslashes($_POST['id']);
    $user->edit($name, $email, $type, $id);
}
header('Location: admin.php');
?>