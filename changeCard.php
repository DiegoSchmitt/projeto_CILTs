<?php  
    require "pages/header.php";
    require "cards.class.php";
    $card = new Cards;

if(isset($_POST['number_card']) && !empty($_POST['number_card'])){
    $type_card = addslashes($_POST['type_card']);
    $number_card = addslashes($_POST['number_card']);
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $time_expected = addslashes($_POST['time_expected']);
    $frequency = addslashes($_POST['frequency']);
    $date = addslashes($_POST['date']);
    if(!isset($_FILES['file'])){
        $filename = $_POST['current_file'];
    }   
    else{   
        $file = $_FILES['file'];

        if($file['error']){
            
        ?>
        <div class="container">
            <div class="danger">
                <div class="msg">
                    <?php
                        echo"Falha ao enviar, tente novamente!";
                    ?>
                </div>
                <div class="close">
                    <a href="editCard.php">x</a>
                </div>
            </div>
        </div>
        <?php
        exit;
        }
        if($file['size'] > 2097152){
        ?>
        <div class="container">
            <div class="danger">
                <div class="msg">
                    <?php
                        echo"Arquivo muito grande! Tamanho máximo permitido 2MB";
                    ?>
                </div>
                <div class="close">
                    <a href="editCard.php">x</a>
                </div>
            </div>
        </div>
        <?php
        exit;
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if($extension != 'jpg' && $extension !='png'){
        ?>
            <div class="container">
                <div class="danger">
                    <div class="msg">
                        <?php
                            echo"Arquivo não permitido! Extenssões permitidas PNG ou JPEG!";
                        ?>
                    </div>
                    <div class="close">
                        <a href="formCards.php">x</a>
                    </div>
                </div>
            </div>
        <?php
        exit;
        }    

            $new_height = 200;
            
            $temporary_image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
            
            $original_width = imagesx($temporary_image);
            
            $original_height = imagesy($temporary_image);

            $new_width = ($original_width * $new_height)/$original_height;

            $resized_image = imagecreatetruecolor($new_width, $new_height);

            imagecopyresampled($resized_image, $temporary_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
            
            $filename = md5(time().rand(0,99)).'.png';
            
            imagepng($resized_image, 'assets\img\cards'.$filename);
    }
}
$card->edit($type_card, $number_card, $title, $description, $time_expected, $filename, $frequency, $date);

header('Location: admin.php');
?>