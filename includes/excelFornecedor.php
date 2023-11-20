<?php
require_once("_db.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>

<table class="table table-striped table-dark " id="table_id">

    <thead>
        <tr>
            <th>ID</th>
            <th>NOME FORNECEDOR</th>
            <th>CNPJ</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");

        $SQL = "SELECT
        id_fornecedor, nome_forn, cnpj
        from fornecedor as forn 
        ORDER BY id_fornecedor ASC;";

        $dato = mysqli_query($conexion, $SQL);

        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

        ?>
                <tr>
                    <td><?php echo $fila['id_fornecedor']; ?></td>
                    <td><?php echo $fila['nome_forn']; ?></td>
                    <td><?php echo $fila['cnpj']; ?></td>
            <?php
            }
        }
