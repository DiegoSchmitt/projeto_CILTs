<?php
    require 'pages/header.php';
    include 'users.class.php';
    $user = new Users();
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $password = md5(addslashes($_POST['password']));
        $type = addslashes($_POST['type']);
        if($user->existEmail($email)==false){
            $user->add($name, $email, $password, $type);
            ?>
             <div class="container">
                 <div class="sucess">
                    <div class="msg">
                        <?php
                            echo"Usuário cadastrado com sucesso!<br/> Deseja cadastrar outro usuário?";
                        ?>
                    </div>
                <a href="formUsers.php">
                <div class="btn-sim" name="btn-sim">
                    Sim
                </div>
                </a>

                <a href="admin.php">
                <div class="btn-nao" name="btn-nao">
                    Não
                </div>
                </a>
            </div>
        </div>
        <?php
        }
        else{
            ?>
             <div class="container">
                 <div class="danger">
                    <div class="msg">
                        <?php
                            echo"Já existe um usuário cadastrado com esse e-mail!";
                        ?>
                    </div>
                <div class="close">
                    <a href="formUsers.php">x</a>
                </div>
            </div>
        </div>
        <?php
        }
    }
?>
<div class="container">
<form method = "POST" class="form">
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
</div>
<?php
    require 'pages/footer.php';
?>