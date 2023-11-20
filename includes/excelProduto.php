<?php
require_once("_db.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>

<table class="table table-striped table-dark " id="table_id">

    <thead>
        <tr>
            <th>ID</th>
            <th>NOME DO PRODUTO</th>
            <th>QUANTIDADE</th>
            <th>NOME DA EMPRESA</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
        $SQL = "SELECT
        id_produtos, nome_produto, qtda_produtos, empresa
        from produtos
        ORDER BY id_produtos ASC;";

        $dato = mysqli_query($conexion, $SQL);

        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

        ?>
                <tr>
                    <td><?php echo $fila['id_produtos']; ?></td>
                    <td><?php echo $fila['nome_produto']; ?></td>
                    <td><?php echo $fila['qtda_produtos']; ?></td>
                    <td><?php echo $fila['empresa']; ?></td>
            <?php
            }
        }
