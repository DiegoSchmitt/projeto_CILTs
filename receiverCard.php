<?php
include 'cards.class.php';
$card = new Cards();
if(isset($_POST['title']) && !empty($_POST['title'])){
    $type_card = addslashes($_POST['type_card']);    
    $number_card = addslashes($_POST['number_card']);
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $time_expected = addslashes($_POST['time_expected']);
    $frequency = addslashes($_POST['frequency']);
    $status = 0;
    $date = addslashes($_POST['date']);
    if($card->existNumberCard($number_card)==false){
        if(isset($_FILES['file']) && !empty($_FILES['file'])){
            $file = $_FILES['file'];

            if($file['error'])
                die("Falha ao enviar arquivo");

            if($file['size'] > 2097152)
                die("Arquivo muito grande! máximo 2MB");

            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if($extension != 'jpg' && $extension !='png')
                die('Tipo de arquivo não aceito!');
                $new_height = 200;
                
                $temporary_image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
                
                $original_width = imagesx($temporary_image);
                
                $original_height = imagesy($temporary_image);

                $new_width = ($original_width * $new_height)/$original_height;
  
                $resized_image = imagecreatetruecolor($new_width, $new_height);

                imagecopyresampled($resized_image, $temporary_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
                
                $filename = md5(time().rand(0,99)).'.png';
                
                imagepng($resized_image, 'assets\img\cards'.$filename);
               // move_uploaded_file($file['tmp_name'], 'assets\img\cards'.$filename);
        }
        $card->add($type_card, $number_card, $title, $description, $time_expected, $filename, $frequency, $status, $date);
        echo "<script>alert('Cartão cadastrado com sucesso!')</script>";
    }else{
        echo "<script>alert('Já existe um cartão com esse numero!')</script>";
    }
}
?>