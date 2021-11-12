<?php
    require 'pages/header.php';
    include 'cards.class.php';
?>
    <h1> <?php echo $_SESSION['name'];?></h1>
    <a href="formExecute.php">Executar CILT</a><br/>
    <a href="index.php">Sair</a> <br/>
<?php
 $card = new Cards();
 $list = $card->getAll();
 require 'formSelect.php';
?>
    