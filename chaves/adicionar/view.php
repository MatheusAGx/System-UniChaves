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
        <h3 class="card-title">Cadastro de Chaves</h3>
        <form action="#" method="post" id="reg_chave" name="reg_chave" enctype="multipart/form-data">
            <div class="row p-2" >
                <div class="col-6">
                    <h6>Nome: </h6>
                    <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome" aria-label="Nome" required>
                </div>
                <div class="col-6">
                    <h6>Instituicao </h6>
                    <select name="instituicao" id="instituicao" class="form-select">
                        <option value="0" selected></option>
                        <?php while($instituicao = $busca_instituicao->fetch_object()) { ?>
                        <option value="<?= $instituicao->id?> "> <?=$instituicao->descricao?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-12">
                    <h6>Descrição: </h6>
                    <textarea class="form-control" aria-label="Descricao" name="descricao" rows="3" cols="50"></textarea>
                </div>
            </div>
                
            <button class="btn btn-primary" name="cadastrar" value="cadastrar">Cadastrar</a>
        </form>
        
    </div>
</div>


<?php 
    include "../../config/footer/footer.php"; 
?>