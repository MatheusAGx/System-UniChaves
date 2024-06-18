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

<div class="card my-2">
    <div class="card-body">
        <a href="/php/chaves" class="btn btn-primary">Voltar</a>
    </div>
</div>
<div class="card my-2" style="width: full;">
    <div class="card-body">
        <h3 class="card-title">Edição de Chave</h3>
        <form action="#" method="post" id="reg_chave" name="reg_chave" enctype="multipart/form-data">
        <?php while($chave = $busca_chave->fetch_object()) { ?>
            <div class="row p-2" >
                <div class="col-6">
                    <h6>Nome:</h6>
                    <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome" aria-label="Nome" required value=<?=$chave->nome ?>>
                </div>
                <div class="col-6">
                    <h6>Instituicao </h6>
                    <select name="instituicao" id="instituicao" class="form-control">
                        <?php while($instituicao = $busca_instituicao->fetch_object()) { ?>
                        <option value="<?= $instituicao->id?>"
                        <?php if ($instituicao->id == $chave->id_instituicao) { echo "selected"; } ?>
                        > <?=$instituicao->descricao?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-12">
                    <h6>Descrição: </h6>
                    <textarea class="form-control" aria-label="Descricao" name="descricao" rows="3" cols="50"><?=$chave->descricao ?></textarea>
                </div>
            </div>
            <button class="btn btn-primary" name="cadastrar" value="cadastrar">Salvar</a>
        <?php } ?>
        </form>
        
    </div>
</div>


<?php 
    include "../../config/footer/footer.php"; 
?>