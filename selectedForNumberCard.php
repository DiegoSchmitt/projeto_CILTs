<link rel="stylesheet" href="assets/css/style.css">
<?php
    require 'pages/header.php';
    include 'class/cards.class.php';
    include 'class/users.class.php';
    require 'config/verifySession.php';

    $user = new Users();
    $card = new Cards();
    if(!empty($_POST['number_card'])){
        $info = $card->getNumberCard($_POST['number_card']);
    }
    elseif($_SESSION['type'] == 0){
          header('Location:users.php');
        }else{
            header('Location:admin.php');
        }
        
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

    $status = $info['status'];
    switch($status){
        case 1:
            $status = 'Em dia';
            break;
        case 2:
            $status = 'Atrasado';
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
<div class=container>
    <div class='card'>
        <div class="title">Titulo:<?php echo $info['title'];?></div>
        <div class="number-frequency" >
            <div class="number">Numero:<?php echo $info['number_card'];?></div>
            <div class=frequency>Frequência: <?php echo $frequency;?></div>
        </div>
        <div>
            <div class="time-type">
                <div class="time">Tempo Programado:<?php echo $info['time_expected'];?></div>
                <div class="type">Tipo:<?php echo $type_card;?></div>
            </div>
        </div>
        <div class="img"><img src="assets/img/<?php echo "user".$info['img'];?>"/></div>
        <div class="description">Descrição:<?php echo $info['description'];?></div>
        <div class="status-date">
            <div class="status">Status:<?php echo $status;?></div>
            <div class="date">Data da Criação:<?php echo $info['date'];?></div>
        </div>
        <div class="time-date">
            <div class="time">Tempo da última execução:<?php echo $info['execution_time'];?></div>
            <div class="last-date">Data da última execução:<?php echo $info['execution_date'];?></div>
        </div>
        <div class="name">Autor da ultima execução:<?php echo $info['name'];?> </div>
        <div class="comment">Comentário:<?php echo $info['comment'];?> </div>
    </div>
</div>