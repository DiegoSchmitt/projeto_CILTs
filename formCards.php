<?php
   require 'pages/header.php';
?>
<form method = "POST" enctype="multipart/form-data" action='receiverCard.php'>
    <h3>Cadastrar novo CILT</h3>
    <div class="input-container">
        <label for="number_card"><i class="fas fa-keyboard"></i></label>
        <input type="number" name="number_card" id="number_card" placeholder="Digite o número do Cartão"/><br/>
    </div>
    <div class="input-container">
        <label for="title"><i class="fas fa-keyboard"></i></label>
        <input type="text" name="title" id="title" placeholder="Digite o título"/><br/>
    </div>
    <textarea name="description" id="description" placeholder="Descreva como a atividade deve ser executada"></textarea><br/>
    Selecione a frequência da execução das atividades:
    <select name="frequency"> <br/>
        <option></option>
        <option>Diário</option>
        <option>Semanal</option>
        <option>Quinzenal</option>
        <option>Mensal</option>
        <option>Trimestral</option>
        <option>Semestral</option>
        <option>Anual</option>
    </select> <br/>
    Foto: <br/>
    <input type="file" name="file"/><br/><br/>
    <input type="submit" value="Enviar"/><br/><br/>
    <a href="admin.php">Voltar</a>
</form>
<?php
    require 'pages/footer.php';
?>