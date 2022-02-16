<?php
   require 'pages/header.php';
   require 'verifySession.php';
?>
<div class="container">
<form method = "POST" enctype="multipart/form-data" action='receiverCard.php' class='form'>
    <h3>Cadastrar novo CILT</h3><br>
    Seleciona o tipo da rotina:
    <select name="type_card"> <br/>
        <option></option>
        <option value='1'>Limpeza</option>
        <option value='2'>Inspeção</option>
        <option value='3'>Lubrificação</option>
        <option value='4'>Reaperto</option>
    </select> <br/>
    <div class="input-container">
        <label for="number_card"><i class="fas fa-keyboard"></i></label>
        <input type="number" name="number_card" id="number_card" placeholder="Digite o número do Cartão"/><br/>
    </div>
    <div class="input-container">
        <label for="title"><i class="fas fa-keyboard"></i></label>
        <input type="text" name="title" id="title" placeholder="Digite o título"/><br/>
    </div>
    <textarea name="description" id="description" placeholder="Descreva como a atividade deve ser executada"></textarea><br/>
    <div class="input-container">
        <label for="time_expected"></label>
        Digite o tempo esperado para execução da atividade em minutos:
        <input type="number" name="time_expected" id="time_expected"/><br/>
    </div>
    Selecione a frequência da execução das atividades:
    <select name="frequency"> <br/>
        <option></option>
        <option value='1'>Diário</option>
        <option value='7'>Semanal</option>
        <option value='15'>Quinzenal</option>
        <option value='30'>Mensal</option>
        <option value='90'>Trimestral</option>
        <option value='180'>Semestral</option>
        <option value='360'>Anual</option>
    </select> <br/>

    <div class="input-container">
        <label for="date"></label>
        Digite a data:
        <input type="date" name="date" id="date"/><br/>
    </div>
    Foto: <br/>
    <input type="file" name="file"/><br/><br/>
    <input type="submit" value="Enviar"/><br/><br/>
    <a href="admin.php">Voltar</a>
</form>
</div>
<?php
    require 'pages/footer.php';
?>