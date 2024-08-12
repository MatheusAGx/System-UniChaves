<?php 
    include "../../config/header/header.php";
?>

<div class="card m-2">
    <div class="card-body">
      <a href="../" class="btn btn-primary">Voltar</a>
    </div>
  </div>

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

<div class="card m-2">
    <div class="card-body">
        <?php while($dados = $busca_dados->fetch_object()) { ?>
        <div class="row mb-2">
            <div class="col-12">
                <h4>Chave: <?= $dados->chave ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h6>Usuário: <?= $dados->usuario ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h6>Data de devolução: <?= $dados->data_dev ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h6>Observações:</h6>
                <textarea class="form-control" name="observacao" id="observacao" readonly><?= $dados->observacao ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <form action="" name="devolver" method="POST">
                    <input type="hidden" value="<?=$id?>">
                    <button class="btn btn-danger" type="submit" name="devolver" id="devolver">Devolver Chave</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php 
    include "../../config/footer/footer.php";
?>