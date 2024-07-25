<?php 
    include "../config/header/header.php";
?>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body" style="width: 600px;">
                    <canvas id="acquisitions">
                    </canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body" style="width: 600px;">
                    <canvas id="acquisitions">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>



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



</script>

<?php 
    include "../config/footer/footer.php";
?>