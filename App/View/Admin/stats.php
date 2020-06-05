
<?php use src\Model;

$this->title = "Statistiques";?>
<?php ob_start(); ?>

<link href="/Web/css/stats.css" rel="stylesheet">
<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<?php $this->head_tags = ob_get_clean();?>

<?php if (isset($data)):?>
  <div id="body">
    <div class="informations">
        <div class="title1">
            <h1>Données utilisateurs</h1>
        </div>
      <div class="top">
        <div class="container">
            <span class="icon"><i class="fal fa-user"></i></span>
            <div class="text">
                <div class="top-text">
                    <span><?php echo $data['avg'][0] ?> ans</span>
                </div>
                <div class="bottom-text">
                    <span>Age moyen</span>
                </div>
            </div>
        </div>

        <div class="container">
            <span class="icon"><i class="fal fa-users"></i></span>
            <div class="text">
                <div class="top-text">
                    <span><?php echo $data['nb'][0] ?></span>
                </div>
                <div class="bottom-text">
                    <span>Utilisateurs enregistrés</span>
                </div>
            </div>
        </div>

        <div class="container">
            <span class="icon"><i class="fal fa-tachometer-alt-fastest"></i></span>
            <div class="text">
                <div class="top-text">
                    <span><?php echo $data['nb'][1] ?></span>
                </div>
                <div class="bottom-text">
                    <span>Tests effectués</span>
                </div>
            </div>
        </div>
      </div>

        <div class="title1">
            <h1>Scores moyens</h1>
        </div>

      <div class="bottom">
          <div class="container">
              <span class="icon"><i class="fal fa-waveform"></i></span>
              <div class="text">
                  <div class="top-text">
                      <span>Acuité sonore</span>
                  </div>
                  <div class="bottom-text">
                      <span><?php echo $data['avg'][1]?>/100</span>
                  </div>
              </div>
          </div>
        <div class="container">
            <span class="icon"><i class="fal fa-heart-rate"></i></span>
            <div class="text">
                <div class="top-text">
                    <span>Gestion du stress</span>
                </div>
                <div class="bottom-text">
                    <span><?php echo $data['avg'][2]?>/100</span>
                </div>
            </div>
        </div>

        <div class="container">
            <span class="icon"><i class="fal fa-low-vision"></i></span>
          <div class="text">
            <div class="top-text">
              <span>Acuité visuelle</span>
            </div>
            <div class="bottom-text">
              <span><?php echo $data['avg'][3]?>/100</span>
            </div>
          </div>
        </div>
      </div>

      <div class="title1">
          <h1>Graphiques</h1>
      </div>

    <div class="charts">
      <div class="graph" id="canvas-holder">
          <canvas id="chart-area-doughnut"></canvas>
          <button id="changeCircleSize">Modifier l'aspect</button>
      </div>
          <br>
          <br>
      <div class="graph">
          <canvas id="chart-area-bar"></canvas>
          <button id="changeMonth">Modifier</button>
      </div>
    </div>

    <script>
        let randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

        let configDoughnut = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        <?php echo $data['doughnut'][0];?>,
                        <?php echo $data['doughnut'][1];?>,
                        <?php echo $data['doughnut'][2];?>,
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
                    'Nombre d\'administrateurs',
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

        let color = Chart.helpers.color;
        let configBar = {
            type: 'bar',
            data: {
                labels: ['<?php echo $data['bar']['date'][0]?>',
                         '<?php echo $data['bar']['date'][1]?>',
                         '<?php echo $data['bar']['date'][2]?>',
                         '<?php echo $data['bar']['date'][3]?>',
                         '<?php echo $data['bar']['date'][4]?>',
                         '<?php echo $data['bar']['date'][5]?>',
                         '<?php echo $data['bar']['date'][6]?>'],
                datasets: [{
                    label: 'Nombre de tests effectués',
                    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.red,
                    borderWidth: 1,
                    data: [
//                        <?php //echo $data['bar']['nbTestsWeek'][6]?>//,
//                        <?php //echo $data['bar']['nbTestsWeek'][5]?>//,
//                        <?php //echo $data['bar']['nbTestsWeek'][4]?>//,
//                        <?php //echo $data['bar']['nbTestsWeek'][3]?>//,
//                        <?php //echo $data['bar']['nbTestsWeek'][2]?>//,
//                        <?php //echo $data['bar']['nbTestsWeek'][1]?>//,
//                        <?php //echo $data['bar']['nbTestsWeek'][0]?>//,
                            12,
                            4,
                            13,
                            2,
                            8,
                            6,
                            16
                    ]
                }, {
                    label: 'Nombre de connexions',
                    backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.blue,
                    borderWidth: 1,
                    data: [
//                        <?php //echo $data['bar']['nbConnexionsWeek'][6]?>//,
//                        <?php //echo $data['bar']['nbConnexionsWeek'][5]?>//,
//                        <?php //echo $data['bar']['nbConnexionsWeek'][4]?>//,
//                        <?php //echo $data['bar']['nbConnexionsWeek'][3]?>//,
//                        <?php //echo $data['bar']['nbConnexionsWeek'][2]?>//,
//                        <?php //echo $data['bar']['nbConnexionsWeek'][1]?>//,
//                        <?php //echo $data['bar']['nbConnexionsWeek'][0]?>//,
                        42,
                        76,
                        14,
                        9,
                        53,
                        18,
                        56
                    ]
                }]

            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Comparaison du nombre de connexions et de tests sur la semaine'
                }
            }
        };

        document.getElementById('changeMonth').addEventListener('click', function() {
            if (window.myBar.data.labels[0] === 'January') {
                window.myBar.data.labels[0]='tamer';
            } else {
                window.myBar.data.labels[0]='January';
            }

            window.myBar.update();
        });


        window.onload = function() {
            let ctx = document.getElementById('chart-area-doughnut').getContext('2d');
            window.myDoughnut = new Chart(ctx, configDoughnut);
            let ctx2 = document.getElementById('chart-area-bar').getContext('2d');
            window.myBar = new Chart(ctx2, configBar)
        };


    </script>

  </div>

<?php endif?>
