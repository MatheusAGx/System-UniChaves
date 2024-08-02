<?php 
    include "../config/header/header.php";
?>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body" style="width: 30vw;">
                    <h6><b>REGISTROS</b></h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Total</th>
                                <th scope="col">Mês</th>
                                <th scope="col">Dia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $r_total['COUNT(id)']; ?></td>
                                <td><?php echo $r_mes['COUNT(id)']; ?></td>
                                <td><?php echo $r_dia['COUNT(id)']; ?></td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body" style="width: 30vw;">
                <h6><b>OCORRENCIAS</b></h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Total</th>
                                <th scope="col">Mês</th>
                                <th scope="col">Dia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $o_total['COUNT(id)']; ?></td>
                                <td><?php echo $o_mes['COUNT(id)']; ?></td>
                                <td><?php echo $o_dia['COUNT(id)']; ?></td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>



    const data = [
        { year: 2010, count: 10 },
        { year: 2011, count: 20 },
        { year: 2012, count: 15 },
        { year: 2013, count: 25 },
        { year: 2014, count: 22 },
        { year: 2015, count: 30 },
        { year: 2016, count: 28 },
    ];

    new Chart(
        document.getElementById('acquisitions'),
        {
        type: 'bar',
        data: {
            labels: data.map(row => row.year),
            datasets: [
            {
                label: 'Registros no Mês',
                data: data.map(row => row.count)
            }
            ]
        }
        }
    );

    new Chart(
        document.getElementById('acquisitions2'),
        {
        type: 'bar',
        data: {
            labels: data.map(row => row.year),
            datasets: [
            {
                label: 'Registros no Dia',
                data: data.map(row => row.count)
            }
            ]
        }
        }
    );



</script> -->

<?php 
    include "../config/footer/footer.php";
?>