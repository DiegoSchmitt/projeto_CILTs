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
    <h3>Selecione o Cartão Rotina</h3>
    <h2>Por número:</h2>
    <select name="number_card" id="number_card">
        <option></option>
        <?php foreach ($list as $item): ?>
        <option>
        <?php
            echo $item["number_card"]; 
        ?>
        </option>
        <?php endforeach; ?>
    </select>
    <h2>Por tipo:</h2>
    <select name="type_card" id="type_card">
        <option></option>
        <option value='1'>Limpeza</option>
        <option value='2'>Inspeção</option>
        <option value='3'>Lubrificação</option>
        <option value='4'>Reaperto</option>
    </select>
    <h2>Por status:</h2>
    <select name="status_card" id="status_card">
        <option></option>
        <option value='1'>Em dia</option>
        <option value='2'>Atrasado</option>
    </select>
    <input type="submit" value="Abrir Cartão Rotina">
</form>