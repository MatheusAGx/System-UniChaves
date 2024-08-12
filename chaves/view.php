<?php
include "../config/header/header.php";

?>
<div class="container-fluid">


  <div class="card">
    <div class="card-body">
      <a href="./adicionar" class="btn btn-primary">Adicionar</a>
    </div>
  </div>

<!-- FILTROS -->
  <div class="card my-2">
    <div class="card-body">
    <h5>Filtros</h5>
      <form action="" method="post" id="formFiltro">
        <div class="row">
          <div class="col-12">
            <small><strong>Nome:</strong></small>
            <input class="form-control" type="text" name="filtro_nome" id="filtro_nome" placeholder="Digite o nome da chave">
          </div>
        </div>
        <div class="row">
          <div class="col-6 mt-2">
            <button class="btn btn-primary" type="submit" name="filtrar" id="filtrar">Filtrar</button>
          </div>
          <div class="col-6 mt-2">
            <?php if(isset($_POST['filtrar'])) { ?>
            <a class="btn btn-danger" href="./index.php" style="float:right;">Limpar Filtro</a>
            <?php } ?>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php foreach ($pagination['results'] as $chave) : ?>

    <div class="card card-hover my-2">
      <div class="card-header" style="align-items: center;">
        <button id="status" style="<?php
         if ($chave['tipo'] == "Disponivel") { echo "background-color: green;";} 
         if ($chave['tipo'] == "Ocupada") { echo "background-color: red;";} 
         if ($chave['tipo'] == "Reservada") { echo "background-color: orange;";} 
         ?>"></button><strong><?= $chave['nome'] ?></strong>
        <?php if ($chave['tipo'] == "Ocupada") { ?> <a class="btn btn-info btn-sm" style="float: right; margin-left: 0.5vw" href="./detalhes/?id=<?= $chave['id'] ?>"> Detalhes </a> <?php } ?>
        <a class="btn btn-success btn-sm" style="float: right; margin-left: 0.5vw" href="./registrar/?id=<?= $chave['id'] ?>"> Registrar </a>
        <a class="btn btn-danger btn-sm" style="float: right; margin-left: 0.5vw" href="./deletar/?id=<?= $chave['id'] ?>"> Deletar </a>
        <a class="btn btn-warning btn-sm" style="float: right;" href="./editar/?id=<?= $chave['id'] ?>"> Editar </a> 
      </div>
      <div class="card-body">
        <div class="col-12 col-sm-12">
          <div><small>Status: <?= $chave['tipo'] ?> | Instituição: <?= $chave['instituicao'] ?> </small> </div>
          <div><small>Descrição: <?= $chave['descricao'] ?> </small> </div>
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