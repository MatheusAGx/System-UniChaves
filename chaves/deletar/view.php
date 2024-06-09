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
    <form method="post" action="" name="formDelete">
        <div class="alert alert-danger" role="alert">
        <strong> Você tem certeza que dejesa deletar este item?</strong>
        <?php while($chave = $busca_chave->fetch_object()) { ?>
            <p><?= $chave->nome ?></p>
        <?php } ?>
        </div>
        <div class="row mb-3 w-50" style="margin: auto;">
            <button class="btn-danger btn" name="deletar" id="deletar">Deletar</button>
        </div>
    </form>
</div>
<?php
include "../../config/footer/footer.php";
?>