<?php 
    include "../config/header/header.php";
?>

<div class="container-fluid">


  <div class="card">
    <div class="card-body">
      <a href="./adicionar" class="btn btn-primary">Adicionar</a>
    </div>
  </div>

  <?php foreach ($pagination['results'] as $ocorrencia) : ?>

    <div class="card card-hover my-2">
      <div class="card-header" style="align-items: center;">
        <strong>OC<?= $ocorrencia['id'] ?></strong>
        <a class="btn btn-danger btn-sm" style="float: right; margin-left: 0.5vw" href="./notificar/?id=<?= $ocorrencia['id'] ?>"> Notificar </a>
      </div>
      <div class="card-body">
        <div class="col-12 col-sm-12">
          <div><small><b>Usuario: <?= $ocorrencia['usuario'] ?></b> | <b>Chave: <?= $ocorrencia['chave'] ?></b> | Data: <?= $ocorrencia['data_ocorrencia'] ?></small> </div>
          <div><small>Descrição: <?= $ocorrencia['descricao'] ?> </small> </div>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
  <nav aria-label="...">
    <ul class="pagination pagination-sm">
      <?= $pagination['pagination'] ?>
    </ul>
  </nav>
</div>

<?php 
    include "../config/footer/footer.php";
?>