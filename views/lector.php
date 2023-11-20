<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/es.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/resp/bootstrap.min.js"></script>
  <title>Vendas</title>
  <style>
    h1 {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    /* Estilo da tabela */
    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #ffffff;
    }

    /* Estilo do cabeçalho da tabela */
    .table thead th {
      background-color: #007bff;
      color: #ffffff;
      border: none;
    }

    /* Estilo das linhas da tabela */
    .table tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 123, 255, 0.25);
    }

    /* Estilo das células da tabela */
    .table tbody tr td {
      border: none;
    }

    /* Estilo dos botões de ação */
    .btn-group .btn {
      margin-right: 5px;
    }

    /* Estilo para ícones dos botões de ação */
    .btn-group .btn i {
      margin-right: 5px;
    }

    /* Estilo para o modal */
    .modal-content {
      background-color: #343a40;
      color: #ffffff;
    }

    /* Estilo para os botões do modal */
    .modal-content .btn-primary,
    .modal-content .btn-secondary {
      background-color: #007bff;
    }

    /* Estilo para os botões de ação do SweetAlert */
    .swal2-confirm,
    .swal2-cancel {
      background-color: #007bff;
      color: #ffffff;
    }
  </style>
</head>
<?php
include 'menu.php';
exibirMenu('B');
?><div class="container is-fluid">
  <div class="col-xs-12">
    <div class="col-xs-12">
      <h1>LISTA DE PEDIDOS</h1>
      <div>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
        $where = "";

        if (isset($_GET['enviar'])) {
          $busqueda = $_GET['busqueda'];


          if (isset($_GET['busqueda'])) {
            $where = "WHERE user.correo LIKE'%" . $busqueda . "%' OR nombre  LIKE'%" . $busqueda . "%'
    OR telefono  LIKE'%" . $busqueda . "%'";
          }
        }
        ?>
        <br>
        <table class="table table-striped table-dark table_id " id="table_id">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOME PRODUTO</th>
              <th>EMPRESA</th>
              <th>QUANTIDADE</th>
              <th>EMPRESA FORNECEDOR</th>
              <th>FUNCIONARIO</th>
              <th>STATUS</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
            $SQL = mysqli_query($conexion, "SELECT
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
            ORDER BY id_pedidos desc;");

            while ($fila = mysqli_fetch_assoc($SQL)) :
            ?>
              <tr>
                <td><?php echo $fila['id_pedidos']; ?></td>
                <td><?php echo $fila['nome_produto']; ?></td>
                <td><?php echo $fila['empresa']; ?></td>
                <td><?php echo $fila['qtda_produto_solicitado']; ?></td>
                <td><?php echo $fila['nome_forn']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['nome_status']; ?></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Ações">
                    <a class="btn btn-warning btn-sm" href="editar_userLector.php?id_pedidos=<?php echo $fila['id_pedidos'] ?>">
                      <i class="fa fa-edit"></i> Editar
                    </a>
                    <a class="btn btn-danger btn-sm btn-del" href="eliminar_userLector.php?id_pedidos=<?php echo $fila['id_pedidos'] ?>">
                      <i class="fa fa-trash"></i> Excluir
                    </a>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
            </body>
        </table>

        <script>
          $('.btn-del').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
              title: 'Tem certeza? Que quer excluir esta venda?',
              text: "Não poderá reverter!!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sim!',
              cancelButtonText: 'Cancelar!',
            }).then((result) => {
              if (result.value) {
                if (result.isConfirmed) {
                  Swal.fire(
                    'Eliminado!',
                    'Esta venda foi excluida.',
                    'Sucesso'
                  )
                }

                document.location.href = href;
              }

            })
          })
        </script>
        <!-- <div id="paginador" class=""></div>-->
        <script src="../package/dist/sweetalert2.all.js"></script>
        <script src="../package/dist/sweetalert2.all.min.js"></script>
        <script src="../package/jquery-3.6.0.min.js"></script>

        <script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
        <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
        <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>

        <script src="../js/page.js"></script>
        <script src="../js/buscador.js"></script>
        <script src="../js/user.js"></script>




        <?php include('../index.php'); ?>

</html>