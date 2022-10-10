<?php
  require 'config/verifySession.php';
  $months  = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
  $month    = date("m");
  $month1   = $months[date("m",mktime(0,0,0,$month-1,0,0))*1];
  $month2   = $months[date("m",mktime(0,0,0,$month-2,0,0))*1];
  $month    = $months[$month-1];
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Expectativa', 'Real'],
          ['<?=$month2;?>', <?=totalTimeExpected(date("Y"), date("m")-2);?>, <?=realTime(date("m")-2);?>],
          ['<?=$month1;?>', <?=totalTimeExpected(date("Y"), date("m")-1);?>, <?=realTime(date("m")-1);?>],
          ['<?=$month;?>', <?=totalTimeExpected(date("Y"), date("m"));?>, <?=realTime(date("m"));?>]
        ]);

        var options = {
          chart: {
            title: 'Comparativo de tempo na execução dos CILTs',
            subtitle: 'Real X Planejado',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 500px; height: 400px;">
    </div>
  </body>
</html>