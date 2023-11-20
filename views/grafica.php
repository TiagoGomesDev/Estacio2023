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
        ['Produto', 'Quantidade'],
        <?php
        $SQL = "SELECT 
                id_produtos, nome_produto, COUNT(*) AS quantidade
                FROM pedidos as pedid
                INNER JOIN produtos as prod ON prod.id_produtos = pedid.fk_produto
                INNER JOIN user as u ON u.id = pedid.fk_funcionario
                GROUP BY id_produtos, nome_produto";

        $consulta = mysqli_query($conexion, $SQL);
        while ($resultado = mysqli_fetch_assoc($consulta)) {
          echo "['" . $resultado['nome_produto'] . "', " . $resultado['quantidade'] . "],";
        }
        ?>
      ]);

      var options = {
        title: 'Quantidade de Produtos Solicitados',
        pieHole: 0.4
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawBarChart);

    function drawBarChart() {
      var dataBar = google.visualization.arrayToDataTable([
        ['Produto', 'Quantidade'],
        <?php
        $SQLBar = "SELECT 
                   id_produtos, nome_produto, COUNT(*) AS quantidade
                   FROM pedidos as pedid
                   INNER JOIN produtos as prod ON prod.id_produtos = pedid.fk_produto
                   INNER JOIN user as u ON u.id = pedid.fk_funcionario
                   GROUP BY id_produtos, nome_produto";
        $consultaBar = mysqli_query($conexion, $SQLBar);
        while ($resultadoBar = mysqli_fetch_assoc($consultaBar)) {
          echo "['" . $resultadoBar['nome_produto'] . "', " . $resultadoBar['quantidade'] . "],";
        }
        ?>
      ]);

      var optionsBar = {
        title: 'Quantidade de Produtos Solicitados',
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
  <h1>Gráficos de Produtos Solicitados</h1>
  <div id="piechart"></div>
  <div id="barchart"></div>
</body>

</html>