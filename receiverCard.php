<?php
include 'cards.class.php';
$card = new Cards();
$file = $_FILES['file'];
/* CONCERTAR BUG!!!!!! 
Mesmo não já existindo o numero da cartão, não salvando no bd, a imagem é salva na pasta img*/
if(isset($file['tmp_name']) && !empty($file['tmp_name'])){
    $filename = md5(time().rand(0,99)).'.png';
    move_uploaded_file($file['tmp_name'], 'assets\img\cards'.$filename);
}

if(isset($_POST['title']) && !empty($_POST['title'])){
    $type_card = addslashes($_POST['type_card']);    
    $number_card = addslashes($_POST['number_card']);
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $time_expected = addslashes($_POST['time_expected']);
    $frequency = addslashes($_POST['frequency']);
    $img = $filename;
    $status = 1;
    $date = addslashes($_POST['date']);
    if($card->existNumberCard($number_card)==false){
        $card->add($type_card, $number_card, $title, $description, $time_expected, $img, $frequency, $status, $date);
        echo "<script>alert('Cartão cadastrado com sucesso!')</script>";
    }else{
        echo "<script>alert('Já existe um cartão com esse numero!')</script>";
    }
}
?>