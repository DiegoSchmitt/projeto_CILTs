<?php
   require 'pages/header.php';
   require 'class/cards.class.php';
   require 'config/verifySession.php';
   
   $card = new Cards;
   $info = $card->getNumberCard($_POST['name-card']); 
   $type_card = $info['type_card'];
   switch($type_card){
       case 1:
           $type_card = 'Limpeza';
           break;
       case 2:
           $type_card = 'Inspeção';
           break;
       case 3:
           $type_card = 'Lubrificação';
           break;
       case 4:
           $type_card = 'Reaperto';
       break;
   }

   $frequency = $info['frequency']; 
   switch($frequency){
       case 1:
           $frequency = 'Diário';
           break;
       case 7:
           $frequency = 'Semanal';
           break;
       case 15:
           $frequency = 'Quinzenal';
           break;
       case 30:
           $frequency = 'Mensal';
           break;
       case 90:
           $frequency = 'Trimestral';
           break;
       case 180:
           $frequency = 'Semestral';
           break;
       case 360:
           $frequency = 'Anual';
           break;
       }   
?>
<link rel="stylesheet" href="assets/css/style.css">
<div class="container">
<form method = "POST" enctype="multipart/form-data" action='changeCard.php' class='form'>
    <h3>Alterar dados do CILT</h3><br>
    Seleciona o tipo da rotina:
    <select name="type_card"> <br/>
        <option><?php echo $type_card;  ?></option>
        <option value='1'>Limpeza</option>
        <option value='2'>Inspeção</option>
        <option value='3'>Lubrificação</option>
        <option value='4'>Reaperto</option>
    </select> <br/>
    Número do CILT:
    <div class="input-container">
        <label for="number_card"><i class="fas fa-keyboard"></i></label>
        <input type="number" name="number_card" id="number_card" value="<?php echo $info['number_card']; ?>" readonly/><br/>
    </div>
    Título:
    <div class="input-container">
        <label for="title"><i class="fas fa-keyboard"></i></label>
        <input type="text" name="title" id="title" value="<?php echo $info['title']; ?>"/><br/>
    </div>
    Descrição:
    <textarea name="description" id="description"><?php echo $info['description'];?></textarea><br/>
    <div class="input-container">
        <label for="time_expected"></label>
        Digite o tempo esperado para execução da atividade em minutos:
        <input type="number" name="time_expected" id="time_expected" value="<?php echo $info['time_expected'];?>"/><br/>
    </div>
    Selecione a frequência da execução das atividades:
    <select name="frequency"> <br/>
        <option><?php echo $frequency; ?></option>
        <option value='1'>Diário</option>
        <option value='7'>Semanal</option>
        <option value='15'>Quinzenal</option>
        <option value='30'>Mensal</option>
        <option value='90'>Trimestral</option>
        <option value='180'>Semestral</option>
        <option value='360'>Anual</option>
    </select> <br/>

    <div class="input-container">
        <label for="date"></label>
        Data de Atualização:
        <input type="date" name="date" id="date" value="<?php echo $info['date']; ?>"/><br/>
    </div>
    Alterar Foto: <br/>
    <input type="file" name="file"/><br/><br/>
    <input  type="text" name="current_file" value="<?php echo $info['img']; ?>">
    <input type="submit" value="Alterar"/><br/><br/>
    <a href="admin.php">Voltar</a>
</form>
</div>
<?php
    require 'pages/footer.php';
?>