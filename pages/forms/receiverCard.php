<?php

/* CONCERTAR BUG!!!!!! 
Mesmo não já existindo o numero da cartão, não salvando no bd, a imagem é salva na pasta img*/

session_start();
require 'C:\xampp\htdocs\Projeto CILTs\config\config.php';

$file = $_FILES['file'];

if(isset($file['tmp_name']) && !empty($file['tmp_name'])){
    $filename = md5(time().rand(0,99)).'.png';
    move_uploaded_file($file['tmp_name'], 'C:\xampp\htdocs\Projeto CILTs\assets\img\cards'.$filename);
}

if(isset($_POST['title']) && !empty($_POST['title'])){
    $number_card = addslashes($_POST['number_card']);
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $frequency = addslashes($_POST['frequency']);
    $img = $filename;

    /* Selecionar na tabela cards o catão cujo numero é igual a variável $number_cards
        se e o resultado for maior que 0, cartão já existe,
        caso contrário inserir o cartão no banco de dados.
    */

    $sql = "SELECT number_card from cards  WHERE number_card = '$number_card' ";
    $sql = $pdo->query($sql);
    if($sql -> rowCount() > 0){
       echo "<script>alert('Number card já registrado!')</script>
       <a href='formCards.php'>Voltar</a><br>";
    }
    else{
        $sql = "INSERT INTO cards SET number_card = '$number_card', title = '$title', description = '$description', file = '$img', frequency = '$frequency'";
        $pdo->query($sql);
    }
}

?>