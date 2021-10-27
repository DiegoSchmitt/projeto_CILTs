<form method = "POST" enctype="multipart/form-data" action='receiverCard.php'>
    Numero do Cartão:<br/>
    <input type="number" name="number_card"/><br/>
    Titulo:<br/>
    <input type="text" name="title"/><br/>
    Descrição:<br/>
    <textarea name="description"></textarea><br/>
    Frequência de execução: <br/>
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
    <input type="submit" value="Enviar"/>
</form>
