<?php
session_start();
require '../config/config.php';

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $password = md5(addslashes($_POST['password']));

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['type'] = $data['type'];
            header("Location: ../receiver.php");
        }
} 
?>
<form action="" method="post">
    E-mail:<br/>
    <input type="email" name="email"><br/>
    Senha:<br/>
    <input type="password" name="password"><br/>
    <input type="submit" value="Entrar">
    <a href="forms/formNewPassword.php">Alterar a senha</a>
</form>