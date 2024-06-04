<?php 
    include "../../config/header/header.php";

?>

<!-- ALERTAS -->

<?php if ($sucesso): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $msg ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
<?php endif; ?>

<?php if ($erro): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $msg ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- CORPO DA PAGINA -->

<form name="registroForm" id="registroForm" method="POST" action="">
    <div class="row p-2">
        <div class="col-6">
            <h6>Selecione o usuário:</h6>
            <select class="form-select" name="usuarios" id="usuarios">
                <option value="0" selected></option>
                <?php while($usuario = $busca_usuario->fetch_object()) { ?>
                <option value=<?=$usuario->id?>><?=$usuario->nome?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-6">
            <h6>Selecione a instituicao:</h6>
            <select class="form-select" name="instituicao" id="instituicao">
                <option value="0" selected></option>
                <?php while($instituicao = $busca_instituicao->fetch_object()) { ?>
                <option value=<?=$instituicao->id?>><?=$instituicao->descricao?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row p-2">
        <div class="col-3">
            <h6>Data de Devolução:</h6>
            <input class="form-control" type="date" name="data_devolucao" id="data_devolucao">
        </div>
        <div class="col-3">
            <h6>Telefone:</h6>
            <input class="form-control" type="text" name="telefone" id="telefone">
        </div>
        <div class="col-6">
            <h6>Email:</h6>
            <input class="form-control" type="email" name="email" id="email">
        </div>
    </div>
    
    <div class="row p-2">
        <div class="col-12">
            <h6>Observação: </h6>
            <textarea class="form-control" aria-label="observacoes" name="observacoes" rows="3" cols="50"></textarea>
        </div>
    </div>
</form>

<?php 
    include "../../config/footer/footer.php"; 
?>