
<?php $this->title = "Forum";?>
<?php ob_start(); ?>
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>
<link href="/Web/css/forum.css" rel="stylesheet">
<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

<div>
    <h1>L'age moyen d'un patient est de <?php echo $data['avg'][0] ?> ans.</h1>
</div>
    <div>
        <h1>Le score moyen du test de son est <?php echo $data['avg'][1] ?>.</h1>
    </div>
    <div>
        <h1>Le score moyen du test de stress est <?php echo $data['avg'][2] ?>.</h1>
    </div>
    <div>
        <h1>Le score moyen du test de vue est <?php echo $data['avg'][3] ?>.</h1>
    </div>
    <div>
        <h1>Il y a  <?php echo $data['nb'][0] ?> utilisateurs enregistrés.</h1>
    </div>
    <div>
        <h1>Il y a eu un total de <?php echo $data['nb'][1] ?> tests.</h1>
    </div>

<div id="canvas-holder" style="width:50%">
    <canvas id="chart-area"></canvas>
</div>

<button id="changeCircleSize">Semi/Full Circle</button>

    <script>

        let randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

        let config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        <?php echo $data['nb'][2][0];?>,
                        <?php echo $data['nb'][2][1];?>,
                        <?php echo $data['nb'][2][2];?>,

                    ],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.blue,
                    ],
                    label: 'Dataset'
                }],
                labels: [
                    'Nombre de patients',
                    'Nombre de gestionnaires',
                    'Nombre d\'administrateur',
                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Répartition des utilisateurs'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };

        window.onload = function() {
            let ctx = document.getElementById('chart-area').getContext('2d');
            window.myDoughnut = new Chart(ctx, config);
        };



        document.getElementById('changeCircleSize').addEventListener('click', function() {
            if (window.myDoughnut.options.circumference === Math.PI) {
                window.myDoughnut.options.circumference = 2 * Math.PI;
                window.myDoughnut.options.rotation = -Math.PI / 2;
            } else {
                window.myDoughnut.options.circumference = Math.PI;
                window.myDoughnut.options.rotation = -Math.PI;
            }

            window.myDoughnut.update();
        });
    </script>

<?php endif?>