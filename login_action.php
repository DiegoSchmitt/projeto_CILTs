<?php
require 'pages/header.php';
include 'users.class.php';

$user = new Users;
if($_POST['email'] == '' || $_POST['password'] == ''){
    header("Location:index.php");
    exit;
}
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $data = $user->getEmail($email);
    $hash = $data['password'];

    if(password_verify($password, $hash)){
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['type'] = $data['type'];
            $_SESSION['file'] = $data['file'];
            header("Location:receiver.php");
            exit;
    }
    else{
        ?>
        <div class="container">
            <div class="danger">
                <div class="msg">
                <?php
                    echo"Email e/ou senha inválido!";
                ?>
            </div>
            <div class="close">
                <a href="index.php">x</a>
            </div>
        </div>
    </div>
    <?php
    }
} 
?>