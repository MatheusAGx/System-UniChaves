<?php 
    include "../../config/header/header.php";
?>
    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="../">Geral</a>
                    <a class="btn btn-primary" href="../ocorrencias">Ocorrências</a>
                </div>
            </div>
        </div>  
    </div>

    <div class="card my-2">
        <div class="card-body">
            <h5>Filtros</h5>
            <form action="" method="post" id="formFiltro">
                <div class="row">
                    <div class="col-4">
                        <small><strong>Chave:</strong></small>
                        <input class="form-control" type="text" name="filtro_chave" id="filtro_chave" placeholder="Digite o nome da chave">
                    </div>
                    <div class="col-4">
                        <small><strong>Usuario:</strong></small>
                        <input class="form-control" type="text" name="filtro_usuario" id="filtro_usuario" placeholder="Digite o nome do usuário">
                    </div>
                    <div class="col-4">
                        <small><strong>Data de Devolução:</strong></small>
                        <input class="form-control" type="date" name="filtro_data_dev" id="filtro_data_dev">
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

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
            <h4 class="mb-3"><b>Registros</b></h4>
                <div class="col-12">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">Chave</th>
                                <th scope="col">Usuário</th>
                                <th scope="col">Data de Devolução</th>
                                <th scope="col">Instituicao</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pagination['results'] as $registros) : ?>
                            <tr>
                                <th scope="row"><?= $registros['chave'] ?></th>
                                <td><?= $registros['usuario'] ?></td>
                                <td><?= $registros['data_dev'] ?></td>
                                <td><?= $registros['instituicao'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
    <nav aria-label="...">
        <ul class="pagination pagination-sm">
        <?= $pagination['pagination'] ?>
        </ul>
    </nav>

<?php 
    include "../../config/footer/footer.php";
?>