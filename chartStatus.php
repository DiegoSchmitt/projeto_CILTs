<?php require 'verifySession.php'; ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'Quantidade de CILTs'],
          ['Em dia',     <?= $list1 ?>],
          ['Atrasado',     <?= $list2 ?>]
        ]);

        var options = {
          title: 'Em Dia x Atrasado',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 500px; height: 400px;"></div>
  </body>
</html>