<?php 
    include "../../config/header/header.php";
?>
        <div class="container-fluid">
            <div class="card m-3">
                <div class="card-body">
                    <a href="../" class="btn btn-primary">Voltar</a>
                </div>
            </div>

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
      
            <div class="card card-hover m-3">
                <div class="card-body">
                    <form action="./" method="post" name="registro" id="registro" enctype="multipart/form-data">
                        <div class="row p-2">
                            <div class="col-6 col-sm-6">
                                <h6>Selecione o usuário:</h6>
                                <select class="form-select" id="usuario" name="usuario">
                                    <option value="0" selected></option>
                                    <?php while ($usuarios = $busca_usuario->fetch_object()) { ?>
                                    <option value="<?=$usuarios->id?>"> <?=$usuarios->nome?> </option>
                                    <?php } ?> 
                                </select>
                            </div>

                            <div class="col-6 col-sm-6">
                                <h6>Selecione a chave: </h6>
                                <select class="form-select" id="chave" name="chave">
                                    <option value="0" selected></option>
                                    <?php while ($chaves = $busca_chave->fetch_object()) { ?>
                                        <option value="<?=$chaves->id?>"> <?= $chaves->nome ?> </option>
                                    <?php } ?> 
                                </select>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 col-sm-6">
                                <h6>Data: </h6>
                                <input class="form-control" type="date" id="data_ocorrencia" name="data_ocorrencia">
                            </div>

                            <div class="col-6 col-sm-6">
                                <h6>Hora: </h6>
                                <input class="form-control" type="time" id="hora" name="hora">
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-12 col-sm-12">
                                <h6>Descreva a ocorrência:</h6>
                                <textarea class="form-control w-100" id="ocorrencia" name="ocorrencia" rows="10">

                                </textarea>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-12 col-sm-12"> 
                                <button class="btn btn-primary" type="submit" id="registrar" name="registrar">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php 
    include "../../config/footer/footer.php";
?>
