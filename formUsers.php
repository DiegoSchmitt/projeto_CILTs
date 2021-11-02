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
    <h3>Cadastrar Novo Usuário</h3>
    <div class="input-container">
        <label for="name"><i class="fas fa-user"></i></label>
        <input type="text" name="name" id="name" placeholder="Nome..."/><br/>
    </div>
    <div class="input-container">
        <label for="email"><i class="fas fa-envelope"></i></label>
        <input type="text" name="email" id="email" placeholder="E-mail..."/><br/>
    </div>
    <div class="input-container">
        <label for="password"><i class="fas fa-lock"></i></label>
        <input type="password" name="password" id="password" placeholder="Senha provisória..."/><br/>
    </div><br/>
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