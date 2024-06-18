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
                    <?php while ($dados = $busca_dados->fetch_object()) {  ?>
                        <div class="row p-2">
                            <div class="col-6 col-sm-6">
                                <h6>Selecione o usuário:</h6>
                                <select class="form-select" id="usuario" name="usuario">
                                    <option value="0" selected></option>
                                    <?php while ($usuarios = $busca_usuario->fetch_object()) { ?>
                                    <option value="<?=$usuarios->id?>" <?php if ($usuarios->id == $dados->id_usuario) { echo "selected"; } ?>> <?=$usuarios->nome?> </option>
                                    <?php } ?> 
                                </select>
                            </div>

                            <div class="col-6 col-sm-6">
                                <h6>Selecione a chave: </h6>
                                <select class="form-select" id="chave" name="chave">
                                    <option value="0" selected></option>
                                    <?php while ($chaves = $busca_chave->fetch_object()) { ?>
                                        <option value="<?=$chaves->id?>"<?php if ($chaves->id == $dados->id_usuario) { echo "selected"; } ?>> <?= $chaves->nome ?> </option>
                                    <?php } ?> 
                                </select>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 col-sm-6">
                                <h6>Data: </h6>
                                <input class="form-control" type="date" id="data_ocorrencia" name="data_ocorrencia" value="<?=$dados->data_ocorrencia?>">
                            </div>

                            <div class="col-6 col-sm-6">
                                <h6>Hora: </h6>
                                <input class="form-control" type="time" id="hora" name="hora" value="<?=$dados->hora_ocorrencia?>">
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-12 col-sm-12">
                                <h6>Descreva a ocorrência:</h6>
                                <textarea type="text" class="form-control" id="ocorrencia" name="ocorrencia" rows="5">
                                    <?=$dados->descricao?>
                                </textarea>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-12 col-sm-12"> 
                                <button class="btn btn-danger" type="submit" id="enviarEmail" name="enviarEmail">Enviar notificação via e-mail</button>
                            </div>
                        </div>
                    <?php } ?>
                    </form>
                </div>
            </div>
        </div>

        <script>
        document.getElementById('ocorrencia').addEventListener('focus', function() {
            this.setSelectionRange(0, 0);
        });
    </script>

<?php 
    include "../../config/footer/footer.php";
?>
