<link rel="stylesheet" href="assets/css/style.css">
<?php 
    require "pages/header.php";
    require "class/cards.class.php";
    require 'config/verifySession.php';
    $card = new Cards;

if(isset($_POST['number_card']) && !empty($_POST['number_card'])){
    $type_card = addslashes($_POST['type_card']);
    $number_card = addslashes($_POST['number_card']);
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $time_expected = addslashes($_POST['time_expected']);
    $frequency = addslashes($_POST['frequency']);
    $date = addslashes($_POST['date']);
    if($card->existNumberCard($number_card)==false){
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

            require "extensionJPEG.php";
            require "extensionPNG.php";
            
            $card->edit($type_card, $number_card, $title, $description, $time_expected, $filename, $frequency, $date);
        }
    }
}
?>
 <div class="container">
        <div class="sucess">
           <div class="msg">
               <?php
                   echo"CILT Alterado com sucesso!<br/>";
               ?>
           </div>
       <a href="admin.php">
       <div class="btn-sim" name="btn-sim">
           Voltar
       </div>
       </a>
</div>