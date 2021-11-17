<?php
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
        }else{?>
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
<div class="container">
<form method="post">
    <h3>Faça o login</h3>
    <div class="input-container">
        <label for="email"><i class="fas fa-envelope"></i></label>
        <input type="email" name="email" id="email" placeholder="Seu e-mail..."/><br/>
    </div>
    <div class="input-container">
        <label for="password"><i class="fas fa-lock"></i></label>
        <input type="password" name="password" id="password" placeholder="Sua senha..."/><br/>
    </div>
    <input type="submit" value="Entrar"><br/><br/>
    <a href="formNewPassword.php">Alterar a senha</a>
</form>
</div>
