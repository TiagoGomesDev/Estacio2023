<?php
require_once "../includes/_db.php";
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
if ($validar == null || $validar == '') {
  header("Location: ../includes/login.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <script src="../js/resp/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/es.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Nome', 'Quantidade'],
        <?php
        $SQL = "SELECT id, nombre, usuario, password FROM user as u";
        $consulta = mysqli_query($conexion, $SQL);
        while ($resultado = mysqli_fetch_assoc($consulta)) {
          echo "['" . $resultado['nombre'] . "', 1],"; // Assume-se que cada linha representa uma entrada válida.
        }
        ?>
      ]);

      var options = {
        title: 'Quantidade de Usuários',
        pieHole: 0.4
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawBarChart);

    function drawBarChart() {
      var dataBar = google.visualization.arrayToDataTable([
        ['Nome', 'Quantidade'],
        <?php
        $SQLBar = "SELECT id, nombre, usuario, password FROM user as u";
        $consultaBar = mysqli_query($conexion, $SQLBar);
        while ($resultadoBar = mysqli_fetch_assoc($consultaBar)) {
          echo "['" . $resultadoBar['nombre'] . "', 1],"; // Assume-se que cada linha representa uma entrada válida.
        }
        ?>
      ]);

      var optionsBar = {
        title: 'Quantidade de Usuários',
        bars: 'horizontal'
      };

      var chartBar = new google.visualization.BarChart(document.getElementById('barchart'));
      chartBar.draw(dataBar, optionsBar);
    }
  </script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      margin-top: 30px;
    }

    #piechart,
    #barchart {
      width: 100%;
      height: 500px;
      margin: 20px auto;
    }
  </style>
</head>

<?php
include 'menu.php';
exibirMenu('A');
?>

<body>
  <h1>Gráficos de Usuários</h1>
  <div id="piechart"></div>
  <div id="barchart"></div>
</body>

</html>