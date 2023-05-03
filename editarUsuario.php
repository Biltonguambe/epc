<h1>Editar Aluno</h1>

<?php
    $sql = "SELECT * FROM alunos WHERE id=".$_REQUEST["id"];
    $res = $coneccao->query($sql);
    $row = $res->fetch_object(); 
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar"> 
    <input type="hidden" name="id" value="<?= $row->id ?>"> 
     
   
    <div class="mb-3">
        <label for="nome_completo">Nome</label>
        <input type="text" name="nome_completo" value="<?= $row->nome_completo?>" id="nome_completo" class="form-control" placeholder="Digite o nome completo do Aluno">  
    </div>

    <div class="mb-3">
    <label for="bairro">Seccioma a Turma</label>
            <select name="turma" value="<?= $row->turma?>" id="bairro" class="form-control" autocomplete required>
                <option value="">-----seleccionar-----</option>
                <option value="A">Turma "A"</option>
                <option value="C">Turma "C"</option>
                <option value="D">Turma "D"</option>
            </select>
    </div>
    <div class="mb-3">
        <label for="matematica">Matematica</label>
        <input type="number" name="matematica" value="<?= $row->matematica?>" class="form-control" id="matematica" step="0.01" placeholder="Digite a media de matematica">

    </div>
    <div class="mb-3">
        <label for="portugues">Portugues</label>
        <input type="number" name="portugues" value="<?= $row->portugues?>" class="form-control" id="portugues" step="0.01" placeholder="Digite a media de portugues">

    </div>

    <div class="mb-3">
        <label for="educacaofisica">Educacao Fisica</label>
        <input type="number" name="educacaofisica" value="<?= $row->educacaofisica?>" class="form-control" id="educacaofisica" step="0.01"placeholder="Digite a media de educacao fisica">
    </div>

    <div class="mb-3">
        <label for="frequencia">Desistiu</label>
        <input type="checkbox" name="frequencia" value="Desistiu" id="frequencia" class="control" >
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>   
    </div>

</form>