<?php 
    require "../pages/header.php"; 
    require '../config/verifySession.php';
?>

<div class="container">
<form method ="POST" class="form" enctype="multipart/form-data" action="receiverUser.php">
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
    <input type="file" name="file" value="default.png"/><br/><br/>
    <input type="submit" value="Cadastrar"/><br/><br/>
    <a href="admin.php">Voltar</a>
</form>
</div>
<?php
    require '../pages/footer.php';
?>