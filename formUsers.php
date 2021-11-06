<?php
    require 'pages/header.php';
    include 'users.class.php';
    $user = new Users();
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $password = md5(addslashes($_POST['password']));
        $type = addslashes($_POST['type']);
        if($user->existeEmail($email)==false){
            $user->adicionar($name, $email, $password, $type);
            echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
            header("Locarion: formUsers.php");
        }else{
            echo "<script>alert('Já existe um usuário com esse e-mail!')</script>";
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