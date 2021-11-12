<form method="post" action="selectedForNumberCard.php">
    <h3>Selecione o Cartão Rotina</h3>
    <h4>Por número:</h4>
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
    <input type="submit" value="Abrir">
</form>
<form action="selectedCard.php" method="post" class="select">
    <h4>Por tipo:</h4>
    <select name="type_card" id="type_card">
        <option></option>
        <option value='1'>Limpeza</option>
        <option value='2'>Inspeção</option>
        <option value='3'>Lubrificação</option>
        <option value='4'>Reaperto</option>
    </select>
    <input type="submit" value="Abrir">
</form>
<form action="selectedCard.php" method="post" class="select">
    <h4>Por status:</h4>
    <select name="status_card" id="status_card">
        <option></option>
        <option value='1'>Em dia</option>
        <option value='2'>Atrasado</option>
    </select>
    <input type="submit" value="Abrir">
</form>