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
      <form action="" method="post" id="formFiltro">
        <div class="row">
          <div class="col-3">
            <input class="form-control" type="text" name="filtro_nome" id="filtro_nome" placeholder="Digite o nome do usuario">
          </div>
          <div class="col-3">
            <input class="form-control" type="text" name="filtro_cpf" id="filtro_nome" placeholder="Digite o CPF do usuário">
          </div>
          <div class="col-3">
            <input class="form-control" type="text" name="filtro_email" id="filtro_nome" placeholder="Digite o email do usuário">
          </div>
          <div class="col-3">
            <input class="form-control" type="text" name="filtro_telefone" id="filtro_nome" placeholder="Digite o telefone do usuário">
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

  <?php foreach ($pagination['results'] as $usuario) : ?>

    <div class="card card-hover my-2">
      <div class="card-header" style="align-items: center;">
        <strong><?= $usuario['nome'] ?></strong>
        <a class="btn btn-outline-danger btn-sm" style="float: right; margin-left: 0.5vw" href="./deletar/?id=<?= $usuario['id'] ?>"> Deletar </a>
        <a class="btn btn-outline-warning btn-sm" style="float: right;" href="./editar/?id=<?= $usuario['id'] ?>"> Editar </a>
      </div>
      <div class="card-body">
        <div class="col-12 col-sm-12">
          <div class="row px-3">

            <?php if ($usuario['cnpj'] != "") { ?>
              <p> CNPJ: <?= $usuario['cnpj'] ?> |
              <?php } else { ?>
                CPF: <?= $usuario['cpf'] ?> |
              <?php } ?>

              Email: <?= $usuario['email'] ?> |

              Telefone: <?= $usuario['telefone'] ?> | </p>

          </div>
          <div class="row px-1">
            <strong> <?= $usuario['tipo'] ?> - <?= $usuario['instituicao'] ?> </strong>
          </div>
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