<?php
    session_start();
    require 'C:\xampp\htdocs\Projeto CILTs\config\config.php';
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $password = md5(addslashes($_POST['password']));
        $type = addslashes($_POST['type']);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
            echo "<script>alert('Já existe uma conta com esse e-mail!')</script>";
        }
        else{
            $sql = "INSERT INTO users SET name = :name, email = :email, password = :password, type = :type";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':name', $name);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':password', $password);
            $sql->bindValue(':type', $type);
            $sql->execute();
            echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
        }
    }
?>
<form method = "POST">
    Nome:<br/>
    <input type="text" name="name"/><br/>
    Email:<br/>
    <input type="text" name="email"/><br/>
    Senha Provisória:<br/>
    <input type="password" name="password"/><br/>
    Usuário ou administrador? <br/>
    <select name="type">
        <option></option>
        <option value="0">Usuário</option>
        <option value="1">Administrador</option>
    </select> <br/>
    <input type="submit" value="Cadastrar"/>
    <a href="../admin.php">Voltar</a>
</form>
