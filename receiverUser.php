<?php
    require 'pages/header.php';
    include 'users.class.php';
    require 'verifySession.php';
    $user = new Users();
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $type = addslashes($_POST['type']);
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        if($user->existEmail($email)==false){
            if(isset($_FILES['file']) && !empty($_FILES['file'])){
                $file = $_FILES['file'];
                if($file['error'] == 4){
                    $user->add($name, $email, $password, $type, $file = 'default.jpg');
                    ?>
                      <div class="container">
                        <div class="sucess">
                            <div class="msg">
                                <?php
                                    echo"Usuário cadastrado com sucesso!<br/> Deseja cadastrar outro usuário?";
                                ?>
                            </div>
                            <a href="formUsers.php">
                            <div class="btn-sim" name="btn-sim">
                                Sim
                            </div>
                            </a>

                            <a href="admin.php">
                            <div class="btn-nao" name="btn-nao">
                                Não
                            </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    exit;
                }
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
                                <a href="formUsers.php">x</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    exit;
                }

                if($file['size'] < 20097152){
                    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                }
                
                else{
                ?>
                <div class="container">
                    <div class="danger">
                        <div class="msg">
                            <?php
                                echo"Arquivo muito grande! Tamanho máximo permitido 2MB";
                            ?>
                        </div>
                        <div class="close">
                            <a href="formUsers.php">x</a>
                        </div>
                    </div>
                </div>
                <?php
                exit;
                }

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
                                    <a href="formUsers.php">x</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    exit;
                }

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
        
                if($extension == 'png' && $file['error'] != 4){
                    $new_height = 200;
                    
                    $temporary_image = imagecreatefrompng($_FILES['file']['tmp_name']);
                    
                    $original_width = imagesx($temporary_image);
                    
                    $original_height = imagesy($temporary_image);
        
                    $new_width = ($original_width * $new_height)/$original_height;
        
                    $resized_image = imagecreatetruecolor($new_width, $new_height);
        
                    imagecopyresampled($resized_image, $temporary_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
                    
                    $filename = md5(time().rand(0,99)).'.png';
                    
                    imagepng($resized_image, 'assets\img\user'.$filename);
        
                }
            }

            $user->add($name, $email, $password, $type, $file);
            ?>
             <div class="container">
                 <div class="sucess">
                    <div class="msg">
                        <?php
                            echo"Usuário cadastrado com sucesso!<br/> Deseja cadastrar outro usuário?";
                        ?>
                    </div>
                <a href="formUsers.php">
                <div class="btn-sim" name="btn-sim">
                    Sim
                </div>
                </a>

                <a href="admin.php">
                <div class="btn-nao" name="btn-nao">
                    Não
                </div>
                </a>
            </div>
        </div>
        <?php
        }

        else{
            ?>
             <div class="container">
                 <div class="danger">
                    <div class="msg">
                        <?php
                            echo"Já existe um usuário cadastrado com esse e-mail!";
                        ?>
                    </div>
                <div class="close">
                    <a href="formUsers.php">x</a>
                </div>
            </div>
        </div>
        <?php
        }
    }

?>