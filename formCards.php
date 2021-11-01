<?php
   require 'pages/header.php';
?>
<form method = "POST" enctype="multipart/form-data" action='receiverCard.php'>
    <h3>Cadastrar novo CILT</h3>
    <input type="number" name="number_card" placeholder="Digite o número do Cartão"/><br/>
    <input type="text" name="title" placeholder="Digite o título"/><br/>
    <textarea name="description" placeholder="Descreva como a atividade deve ser executada"></textarea><br/>
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