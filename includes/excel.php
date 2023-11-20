<?php
require_once("_db.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>

<table class="table table-striped table-dark " id="table_id">

    <thead>
        <tr>
            <th>ID</th>
            <th>NOME do PRODUTO</th>
            <th>NOME DA EMPRESA</th>
            <th>QUANTIDADE</th>
            <th>NOME DO FORNECEDOR</th>
            <th>NOME DO FUNCIONARIO</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
        $SQL = "SELECT
        id_pedidos, qtda_produto_solicitado, fk_produto, fk_fornecedor, fk_funcionario, status, 
        id_produtos, nome_produto, qtda_produtos, empresa, 
        id_fornecedor, nome_forn, cnpj,
        id_status, nome_status,
        id, nombre, correo, fecha, cargo, usuario
        from pedidos as pedid
        inner join produtos as prod on prod.id_produtos = pedid.fk_produto
        inner join status as st on st.id_status = pedid.status
        inner join fornecedor as forn on forn.id_fornecedor = pedid.fk_fornecedor
        inner join user as u ON u.id = pedid.fk_funcionario
        ORDER BY id_pedidos ASC;";
        $dato = mysqli_query($conexion, $SQL);

        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

        ?>
                <tr>
                    <td><?php echo $fila['id_pedidos']; ?></td>
                    <td><?php echo $fila['nome_produto']; ?></td>
                    <td><?php echo $fila['empresa']; ?></td>
                    <td><?php echo $fila['qtda_produto_solicitado']; ?></td>
                    <td><?php echo $fila['nome_forn']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['nome_status']; ?></td>
            <?php
            }
        }
