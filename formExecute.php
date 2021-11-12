<?php
    require "pages\header.php";
    include "cards.class.php";
    $card = new Cards();
    $list = $card->getAll();
    if(isset($_POST['number_card']) && !empty($_POST['number_card'])){
        $info = $card->getNumberCard($_POST['number_card']);
        $frequency = $info['frequency'];
        $number_card = addslashes($_POST['number_card']);
        $execution_date = addslashes($_POST['execution_date']);
        $execution_time = addslashes($_POST['execution_time']);
        $comment = addslashes($_POST['comment']);
        $name = addslashes($_POST['name']);
        $card->executeCard($number_card, $execution_date, $execution_time, $comment, $name);
        $card->alterStatus($execution_date, $frequency, $number_card);
    }
?>
<form method="post">
    Selecione o número do CILT: 
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
    <div class="input-container">
        <label for="execution_date"></label>
        Data de execução:
        <input type="date" name="execution_date" id="execution_date"/><br/>
    </div>
    <div class="input-container">
        <label for="execution_time"></label>
        Tempo de execução:
        <input type="time" name="execution_time" id="execution_time"/><br/>
    </div>
    <textarea name="comment" id="comment" placeholder="Comente sobre a execução da atividade"></textarea><br/>
    <div class="input-container">
        <label for="name"></label>
        Nome:
        <input type="text" name="name" id="name" value="<?php echo $_SESSION['name'];?>" readonly/><br/>
    </div>
    <div class="input-container">
        <input type="submit" value="Enviar">
    </div>
</form>