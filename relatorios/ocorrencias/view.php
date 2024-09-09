<?php 
    include "../../config/header/header.php";
?>
    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="../">Geral</a>
                    <a class="btn btn-primary" href="../registros">Registros</a>
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
                        <select class="form-select" name="filtro_chave" id="filtro_chave">
                            <option value="0" selected></option>
                            <?php while ($chave = $busca_chave->fetch_object()) { ?>
                            <option value="<?=$chave->id?>"><?=$chave->nome?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <small><strong>Usuario:</strong></small>
                        <select class="form-select" name="filtro_usuario" id="filtro_usuario">
                            <option value="0" selected></option>
                            <?php while ($usuario = $busca_usuario->fetch_object()) { ?>
                            <option value="<?=$usuario->id?>"><?=$usuario->nome?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <small><strong>Data de Devolução:</strong></small>
                        <input class="form-control" type="date" name="filtro_data_oc" id="filtro_data_oc">
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
                                <th scope="col">Data da Ocorrência</th>
                                <th scope="col">Hora de Ocorrência</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pagination['results'] as $ocorrencias) : ?>
                            <tr>
                                <th scope="row"><?= $ocorrencias['chave'] ?></th>
                                <td><?= $ocorrencias['usuario'] ?></td>
                                <td><?= $ocorrencias['data_oc'] ?></td>
                                <td><?= $ocorrencias['hora'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <div class="col-md-12 head m-2">
            <div class="float-right">
                <a href="export.php" class="btn btn-success"><i class="dwn"></i> Export</a>
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