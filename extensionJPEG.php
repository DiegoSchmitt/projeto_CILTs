<?php
if($extension == 'jpeg' || $extension == 'jpg'){
    $new_height = 200;
    $temporary_image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
    $original_width = imagesx($temporary_image);
    $original_height = imagesy($temporary_image);
    $new_width = ($original_width * $new_height)/$original_height;
    $resized_image = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($resized_image, $temporary_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
    $filename = md5(time().rand(0,99)).'.jpeg';
    imagejpeg($resized_image, 'assets\img\user'.$filename);
}    
?>