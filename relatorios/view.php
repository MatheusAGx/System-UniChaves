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

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
            <h4 class="mb-3"><b>Status Geral</b></h4>
            <small><button style="background-color: rgb(96, 235, 177); width: 15px; height: 15px; border-radius: 50%;"></button> Chave Disponível - <?=$d_chave['COUNT(*)']?></small>
            <small><button class="mb-3" style="background-color: rgb(245, 103, 103); width: 15px; height: 15px; border-radius: 50%;"></button> Chave Ocupada - <?=$oc_chave['COUNT(*)']?></small>
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
            <h6>Total de chaves: <?=$t_chave['COUNT(*)']?></h6>
        </div>  
    </div>

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="p-1" style="text-align:center;"><b>Registros por Mês</b></h4>
                    <canvas id="reg_mês"></canvas>
                </div>
                <div class="col-6">
                    <h4 class="p-1" style="text-align:center;"><b>Registros por Instituição</b></h4>
                    <canvas id="reg_instituicao"></canvas>
                </div>
            </div>
        </div>
    </div>


    <script>

        const ctx = document.getElementById('reg_mês');
        new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
            label: 'Registros',
            data: [<?=$reg_agosto['COUNT(id)']?>, <?=$reg_setembro['COUNT(id)']?>, <?=$reg_outubro['COUNT(id)']?>, <?=$reg_novembro['COUNT(id)']?>, <?=$reg_dezembro['COUNT(id)']?>],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
        },
        });

        const ctz = document.getElementById('reg_instituicao');

        new Chart(ctz, {
        type: 'bar',
        data: {
        labels: ['Unicamp - FT', 'Unicamp - FCA', 'Cotil', 'Portaria'],
        datasets: [{
            label: 'Registros',
            data: [<?=$reg_ft['COUNT(id)']?>, <?=$reg_fca['COUNT(id)']?>, <?=$reg_cotil['COUNT(id)']?>, <?=$reg_portaria['COUNT(id)']?>],
            borderWidth: 1
            }]
        },
        });

    </script>

<?php 
    include "../config/footer/footer.php";
?>