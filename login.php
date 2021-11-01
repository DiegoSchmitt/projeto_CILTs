<?php
    require 'pages/header.php';
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
            header("Location:receiver.php");
        }
} 
?>
<form method="post">
    <h3>Faça o login</h3>
    <input type="email" name="email"  placeholder="Seu e-mail..."><br/>
    <input type="password" name="password"  placeholder="Sua senha..."><br/>
    <input type="submit" value="Entrar"><br/><br/>
    <a  href="formNewPassword.php" id="alterar">Alterar a senha</a>
    <a href="index.php" id="voltar">Voltar</a>
</form>

<?php
    require 'pages/footer.php';
?>