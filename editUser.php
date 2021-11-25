<?php
    require "pages/header.php";
    require "users.class.php";
    $user = new Users;
    $info = $user->getId($_POST['name-user']);
    if($info['type'] == 0){
        $type = 'Usuário';
    }else{
        $type = 'Administrador';
    }

?>

<div class="container">
<form method = "POST" class="form" action="changeUser.php">
    <h3>Alterar Dados</h3>
    <div class="input-container">
        <label for="name"><i class="fas fa-user"></i></label>
        <input type="text" name="name" id="name" value="<?php echo $info['name'];?>"/><br/>
    </div>
    <div class="input-container">
        <label for="email"><i class="fas fa-envelope"></i></label>
        <input type="text" name="email" id="email" value="<?php echo $info['email'] ?>"/><br/>
    </div>
    Nível hierarquico:  
    <select name="type">
        <option value="<?php echo $info['type'];?>"><?php echo $type;?></option>
        <option value="0">Usuário</option>
        <option value="1">Administrador</option>
    </select> <br/>
    <input type="hidden" name="id" id="id" value="<?php echo $info['id'];?>">
    <input type="submit" value="Atualizar"/><br/><br/>
    <a href="admin.php">Voltar</a>
</form>
</div>