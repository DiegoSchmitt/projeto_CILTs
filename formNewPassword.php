<?php
    require 'pages/header.php';
?>
<form method="post">
    <h3>Alterar Senha</h3>
    <input type="email" name="email" placeholder="Seu e-mail..."/><br/>
    <input type="password" name="password" placeholder="Sua senha atual..."/><br/>
    <input type="password" name="new_password" placeholder="Sua nova senha..."/><br/>
    <input type="password" name="confirm_password" placeholder="Confirme sua nova senha..."/><br/>
    <input type="submit" value="Alterar Senha"/><br/><br/>
    <a href="login.php">Voltar</a>
</form>

<?php
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $password = md5(addslashes($_POST['password']));
    $new_password = md5(addslashes($_POST['new_password']));
    $confirm_password =  md5(addslashes($_POST['confirm_password']));

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            if($new_password === $confirm_password){
                $sql = $pdo->prepare("UPDATE users SET password = :new_password WHERE id = :id");
                $sql->bindValue(':new_password', $new_password);
                $sql->bindValue(':id', $data['id']);
                $sql->execute();

                echo "<script>alert('Senha alterada com sucesso!')</script>";
            }
            else{
                echo "<script>alert('Nova senha e confimação devem ser iguais!')</script>";
            }
        }else{
            echo "<script>alert('Email e/ou senha incorreto!')</script>";
        }
}

require 'pages/footer.php';
?>