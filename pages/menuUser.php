<link rel="stylesheet" href="assets/css/style.css">
<?php     
    require 'config/verifySession.php'; 
?>
<body>
    <input type="checkbox" id="check-menu">
    <header>
        <div class="left">
            <h3>Gerenciador de <span>CILT</span></h3>
        </div>

        <div class="icon-menu">
            <label for="check-menu">
                <ion-icon name="menu-outline" id="sidebar_btn"></ion-icon>
            </label>
        </div>

        <div class="right">
            <a href="exit.php" class="sair_btn">Sair</a>
        </div>
    </header>
    <nav>
        <div class="menu">
            <center>
                <img src="assets/img/<?php echo 'user'.$_SESSION['file']; ?>" class="image" alt="">
                <h2><?php echo $_SESSION['name']; ?></h2>
            </center>
            <a href="forms/formExecute.php"><ion-icon name="person-add"></ion-icon>Executar CILT</a>
            
            <div class="sub-menu-filter">
            <input type="checkbox" id="filter">
            <label for="filter"><ion-icon name="open"></ion-icon>Abrir CILT</label>
            <ul id="menu-open-cilt">
                <li>
                    <div class="sub-menu">
                        <input type="checkbox" id="filter-number">
                        <label for="filter-number">Filtrar Por Número</label>
                        <ul>
                            <li>
                                <form method="post" action="selectedForNumberCard.php" class="form-menu">
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
                                    <input type="submit" value="Abrir">
                                </form>                                
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <div class="sub-menu">
                        <input type="checkbox" id="filter-type">
                        <label for="filter-type">Filtrar Por Tipo</label>
                        <ul>
                            <li>
                            <form action="selectedCard.php" method="post" class="form-menu">
                                <select name="type_card" id="type_card">
                                <option></option>
                                <option value='1'>Limpeza</option>
                                <option value='2'>Inspeção</option>
                                <option value='3'>Lubrificação</option>
                                <option value='4'>Reaperto</option>
                                </select>
                                <input type="submit" value="Abrir">
                            </form>
                            </li>
                        </ul>
                    </div>                
                </li>

                <li>
                    <div class="sub-menu">
                        <input type="checkbox" id="filter-status">
                        <label for="filter-status">Filtrar Por Status</label>
                        <ul>
                            <li>
                                <form action="selectedCard.php" method="post" class="form-menu">
                                    <select name="status_card" id="status_card">
                                    <option></option>
                                    <option value='1'>Em dia</option>
                                    <option value='2'>Atrasado</option>
                                    </select>
                                    <input type="submit" value="Abrir">
                                </form>       
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
            <a href="exit.php"><ion-icon name="close-circle"></ion-icon>Sair</a>
        </div>
    </nav>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>