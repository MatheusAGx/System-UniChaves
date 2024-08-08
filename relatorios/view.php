<?php 
    include "../config/header/header.php";
?>
<div class="container-fluid">
    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary mr-2" href="">Usuários e Chaves</button>
                    <button class="btn btn-primary mr-2" href="">Ocorrências</button>
                    <button class="btn btn-primary mr-2" href="">Registros</button>
                </div>  
            </div>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-body">
        <h5>Filtros</h5>
            <form action="" method="post" id="formFiltro">
                <div class="row">
                    <div class="col-3">
                        <small><strong>Nome do Usuário:</strong></small>
                        <input class="form-control" type="text" name="filtro_usuario" id="filtro_usuario" placeholder="Digite o nome do usuário">
                    </div>
                    <div class="col-3">
                        <small><strong>Nome da Chave:</strong></small>
                        <input class="form-control" type="text" name="filtro_chave" id="filtro_chave" placeholder="Digite o nome da chave">
                    </div>
                    <div class="col-3">
                        <small><strong>Data de Devolução:</strong></small>
                        <input class="form-control" type="date" name="filtro_data" id="filtro_data">
                    </div>
                    <div class="col-3">
                        <small><strong>Instituição:</strong></small>
                        <input class="form-control" type="text" name="filtro_inst" id="filtro_inst" placeholder="Digite o nome da instituição">
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
                            <?php while($dados = $chave_usuario->fetch_object()) { ?>
                            <tr>
                                <th scope="row"><?= $dados->chave ?></th>
                                <td><?= $dados->usuario ?></td>
                                <td><?= $dados->data ?></td>
                                <td><?= $dados->instituicao ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>
<?php 
    include "../config/footer/footer.php";
?>