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

<div class="card">
    <div class="card-body">
      <a href="../" class="btn btn-primary">Voltar</a>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <form name="registroForm" id="registroForm" method="POST" action="">
            <div class="row p-2">
                <div class="col-6">
                    <h6>Selecione o usuário:</h6>
                    <select class="form-select" name="id_usuario" id="id_usuario">
                        <option value="0" selected></option>
                        <?php while($usuario = $busca_usuario->fetch_object()) { ?>
                        <option value=<?=$usuario->id?>><?=$usuario->nome?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-6">
                    <h6>Data de Devolução:</h6>
                    <input class="form-control" type="date" name="data_devolucao" id="data_devolucao">
                </div>
            </div>
            
            <div class="row p-2">
                <div class="col-12">
                    <h6>Observação: </h6>
                    <textarea class="form-control" aria-label="observacoes" name="observacoes" rows="10" cols="50"></textarea>
                </div>
            </div>
            

            <div class="row p-2">
                <div class="col-12">
                    <?php while($chave = $busca_chave->fetch_object()) { ?>
                        <input type="hidden" name="id_chave" id="id_chave" value=<?=$chave->id?>>
                    <?php } ?>
                    <button class="btn btn-primary" name="registrar" id="registrar">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php 
    include "../../config/footer/footer.php"; 
?>