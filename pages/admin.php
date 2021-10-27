<?php
    session_start();
?>
    <h1> <?php echo $_SESSION['name'];?></h1>
    <a href="../index.php">Sair</a> <br/>
    <a href="forms/formUsers.php">Cadastrar Novo Usuário</a><br>
    <a href="forms/formCards.php">Cadastrar Novo Cartão Rotina</a><br>