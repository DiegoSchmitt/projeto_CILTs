<?php
    require 'pages/header.php';
    require 'users.class.php';
?>
<div class="container">
<form method="post" class="form">
    <h3>Alterar Senha</h3>
    <div class="input-container">
        <label for="email"><i class="fas fa-envelope"></i></label>
        <input type="email" name="email" id="email" placeholder="Seu e-mail..."/><br/>
    </div>
    <div class="input-container">
        <label for="password"><i class="fas fa-lock"></i></label>
        <input type="password" name="password" id="password" placeholder="Sua senha atual..."/><br/>
    </div>
    <div class="input-container">
        <label for="new_password"><i class="fas fa-lock"></i></label>
        <input type="password" name="new_password" id="new_password" placeholder="Sua nova senha..."/><br/>
    </div>
    <div class="input-container">
        <label for="confirm_password"><i class="fas fa-lock"></i></label>
        <input type="password" name="confirm_password" id="corfirm_password" placeholder="Confirme sua nova senha..."/><br/>
    </div>
    <input type="submit" value="Alterar Senha"/><br/><br/>
    <a href="index.php">Voltar</a>
</form>
</div>

<?php
$user = new Users;
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['new_password']) && !empty($_POST['new_password'])){
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $new_password = addslashes($_POST['new_password']);
    $confirm_password =  addslashes($_POST['confirm_password']);
    $data = $user->getEmail($email);
    $hash = $data['password'];

    if(password_verify($password, $hash)){
        $_SESSION['id'] = $data['id'];
    }
    else{
        echo "<script>alert('Email e/ou senha incorreto!')</script>";
    }

    if($confirm_password == $new_password){
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $user->alterPassword($new_password, $_SESSION['id']);
        echo "<script>alert('Senha alterada com sucesso!')</script>";
    }
    else{
        echo "<script>alert('Nova senha e confimação devem ser iguais!')</script>";
    }
}
require 'pages/footer.php';
?>