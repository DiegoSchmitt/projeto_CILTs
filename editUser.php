<?php
    require "pages/header.php";
    require "class/users.class.php";
    require 'config/verifySession.php';
    $user = new Users;
    $info = $user->getId($_POST['name-user']);
    if($info['type'] == 0){
        $type = 'Usuário';
    }else{
        $type = 'Administrador';
    }

?>
<link rel="stylesheet" href="assets/css/style.css">
<div class="container">
<form method = "POST" enctype="multipart/form-data" class="form" action="changeUser.php">
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

    Alterar Foto: <br/>
    <input type="file" name="file"/><br/><br/>
    <input  type="text" name="current_file" value="<?php echo $info['file']; ?>">
    <input type="submit" value="Atualizar"/><br/><br/>
    <a href="admin.php">Voltar</a>

</form>
</div>