<?php
    session_start();
?>
    <h1> <?php echo $_SESSION['name'];?></h1>
    <a href="formExecute.php">Executar CILT</a>
    <a href="index.php">Sair</a> <br/>
    