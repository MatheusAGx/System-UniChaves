<?php 
    include "../config/header/header.php";
?>
    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="./registros">Registros</a>
                    <a class="btn btn-primary" href="./ocorrencias">Ocorrências</a>
                </div>
            </div>
        </div>  
    </div>

    <!-- <div class="card my-2">
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
    </div> -->

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
            <h4 class="mb-3"><b>Status Geral</b></h4>
            <?php while ($chave = $busca_chave->fetch_object()) { ?>
                <div class="col-4 my-2 text-center">
                    <div class="card">
                        <div class="card-body" style="border-radius: 5px;<?php if ($chave->id_status == 2) {echo 'background-color: rgb(245, 103, 103); color: white;';} else {echo 'background-color: rgb(96, 235, 177); color:white';} ?>">
                        <h6><?=$chave->nome ?></h6>
                        <div>
                            <small><?= $chave->instituicao ?></small>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>  
    </div>

<?php 
    include "../config/footer/footer.php";
?>