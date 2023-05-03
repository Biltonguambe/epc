<h1>Cadastrar Novo Aluno</h1>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar"> 
    
    <div class="mb-3">
        <label for="nome_completo">Nome</label>
        <input type="text" name="nome_completo" id="nome_completo" class="form-control" placeholder="Digite o nome completo do Aluno">  
    </div>

    <div class="mb-3">
    <label for="bairro">Secciona a Turma</label>
            <select name="turma" id="bairro" class="form-control" autocomplete="off" required= "required">
                <option value="">-----seleccionar-----</option>
                <option value="A">Turma "A"</option>
                <option value="C">Turma "C"</option>
                <option value="D">Turma "D"</option>
            </select>
    </div>
    <div class="mb-3">
        <label for="matematica">Matematica</label>
        <input type="number" name="matematica" class="form-control" id="matematica" step="0.01" placeholder="Digite a media de matematica">

    </div>
    <div class="mb-3">
        <label for="portugues">Portugues</label>
        <input type="number" name="portugues" class="form-control" id="portugues" step="0.01" placeholder="Digite a media de portugues">

    </div>

    <div class="mb-3">
        <label for="educacaofisica">Educacao Fisica</label>
        <input type="number" name="educacaofisica" class="form-control" id="educacaofisica" step="0.01" placeholder="Digite a media de Educacao Fisica">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>   
    </div>

</form>