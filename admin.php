<?php
    require 'pages/header.php';
    include 'cards.class.php';
   
?>
    <h1> <?php echo $_SESSION['name'];?></h1>
    <a href="index.php">Sair</a> <br/>
    <a href="formUsers.php">Cadastrar Novo Usuário</a><br>
    <a href="formCards.php">Cadastrar Novo Cartão Rotina</a><br>
<?php
 $card = new Cards();
 $list = $card->getAll();
?>
<form method="post" action="card.php">
    <h3>Selecione o Cartão Rotina:</h3>
    <select name="card" id="card">
        <option></option>
        <?php foreach ($list as $item): ?>
        <option>
        <?php
            echo $item["number_card"]; 
        ?>
        </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Abrir Cartão Rotina">
</form>