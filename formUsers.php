<?php
    require 'pages/header.php';
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
    <input type="text" name="name" placeholder="Nome..."/><br/>
    <input type="text" name="email" placeholder="E-mail..."/><br/>
    <input type="password" name="password" placeholder="Senha provisória..."/><br/>
    Selecione o nível hierarquico, Usuário ou Administrador:  
    <select name="type">
        <option></option>
        <option value="0">Usuário</option>
        <option value="1">Administrador</option>
    </select> <br/>
    <input type="submit" value="Cadastrar"/><br/><br/>
    <a href="admin.php">Voltar</a>
</form>
<?php
    require 'pages/footer.php';
?>