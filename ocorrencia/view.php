<?php 
    include "../config/header/header.php";
?>
        <div class="container-fluid">
            <div class="card m-3">
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Voltar</a>
                </div>
            </div>
      
            <div class="card card-hover m-3">
                <div class="card-body">
                    <form action="./" method="post" name="registro" id="registro" enctype="multipart/form-data">
                        <div class="row p-2">
                            <div class="col-6 col-sm-6">
                                <h6>Selecione o usuário:</h6>
                                <select class="form-control" id="usuario" name="usuario">
                                    <option><?= $usuarios->nome ?></option>
                                </select>
                            </div>

                            <div class="col-6 col-sm-6">
                                <h6>Selecione a chave: </h6>
                                <select class="form-control" id="chave" name="chave">
                                    <option></option>
                                </select>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-6 col-sm-6">
                                <h6>Data: </h6>
                                <input class="form-control" type="date" id="dataSel" name="dataSel">
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
                                <button class="btn btn-danger" type="submit" id="enviarEmail" name="enviarEmail" style="float:right">Enviar notificação via e-mail</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php 
    include "../config/footer/footer.php";
?>
</html>