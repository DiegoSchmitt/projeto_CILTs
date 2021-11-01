<?php
    session_start();
?>
    <h1> <?php echo $_SESSION['name'];?></h1>
    <a href="index.php">Sair</a> <br/>
    <a href="formUsers.php">Cadastrar Novo Usuário</a><br>
    <a href="formCards.php">Cadastrar Novo Cartão Rotina</a><br>