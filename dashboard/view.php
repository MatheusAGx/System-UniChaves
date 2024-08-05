<?php 
    include "../config/header/header.php";
?>
<div class="container-fluid mb-3">
    <div class="card my-2">
        <div class="card-body">
            <h4 class="p-1" style="text-align:center;"><b>Estatísiticas</b></h4>
            <div class="row">
                <div class="col-4">
                    <div class="bg-success p-10 text-white text-center py-2 rounded">
                        <h5 class="m-b-0 m-t-5"><?php echo $r_dia['COUNT(id)']; ?></h5>
                        <small class="font-light">Registros Hoje</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="bg-warning p-10 text-white text-center py-2 rounded">
                        <h5 class="m-b-0 m-t-5"><?php echo $r_mes['COUNT(id)']; ?></h5>
                        <small class="font-light">Registros do Mês</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="bg-dark p-10 text-white text-center py-2 rounded">
                        <h5 class="m-b-0 m-t-5"><?php echo $r_total['COUNT(id)']; ?></h5>
                        <small class="font-light">Registros Total</small>
                    </div>
                </div>  
            </div>
            <div class="row my-3">
                <div class="col-4">
                    <div class="bg-primary p-10 text-white text-center py-2 rounded">
                        <h5 class="m-b-0 m-t-5"><?php echo $o_dia['COUNT(id)']; ?></h5>
                        <small class="font-light">Ocorrências Hoje</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="bg-info p-10 text-white text-center py-2 rounded">
                        <h5 class="m-b-0 m-t-5"><?php echo $o_mes['COUNT(id)']; ?></h5>
                        <small class="font-light">Ocorrências do Mês</small>
                    </div>
                </div>
                <div class="col-4">
                    <div class="bg-danger p-10 text-white text-center py-2 rounded">
                        <h5 class="m-b-0 m-t-5"><?php echo $o_total['COUNT(id)']; ?></h5>
                        <small class="font-light">Ocorrências Total</small>
                    </div>
                </div>  
            </div>
        </div>  
    </div>

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <h4 class="p-1" style="text-align:center;"><b>Chaves</b></h4>
                    <canvas id="chaves"></canvas>
                </div>
                <div class="col-8">
                    <h4 class="mb-3" style="text-align:center;"><b>Chaves em Utilização e Usuários</b></h4>
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

<script>
    //CHAVE
    const data_pie = {
    labels: [
        'Disponíveis',
        'Em Uso',
    ],
    datasets: [{
        data: [ <?php echo json_encode($count_disp); ?>, <?php echo json_encode($count_reg); ?>],
        backgroundColor: [
        'rgb(36, 201, 124)',
        'rgb(13, 202, 240)'
        //'rgb(255, 99, 132)',
        //'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
    };


    new Chart(
        document.getElementById('chaves'),
        {
        type: 'doughnut',
        data: data_pie
        }
    );


    //USUARIO + CHAVE
    /*const labels = Utils.months({count: 7});
    const data = {
    labels: labels,
    datasets: [{
        label: 'My First Dataset',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
        ],
        borderWidth: 1
    }]
    };

    new Chart(
        document.getElementById('chaves'),
        {
        type: 'bar',
        data: data_pie
        }
    ); */



</script>

<?php 
    include "../config/footer/footer.php";
?>