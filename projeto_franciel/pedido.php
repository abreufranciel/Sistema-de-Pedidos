<?php

require'./db/config.php';
include'pedido.class.php';


session_start();

if (empty($_SESSION['logado'])) {
    header("location:login.php");
}

$pedido =new Pedido();



?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    


    <title>Pedido</title>
</head>

<body>



    <div class="container">
        <h1 class="title_adc">Gestão de Pedido</h1>


        <div>
        <a href="painel.php" class="back fas fa-backward"></a>
        <a href="cad_pedido.php" class="botao btn btn-primary">Cadastrar Pedido</a>
        </div>

        
        <table class="table">
        
            <tr>
                <th>ID</th>
                <th>CLIENTE</th>
                <th>PRODUTO</th>
                <th>QUANTIDADE</th>
                <th>DATA</th>
                <th>AÇÕES</th>
            </tr>
       
      
            <?php
             $pedidoLista = $pedido->todosPedido();                    
             foreach($pedidoLista as $pedidos):
            ?>
            <tr>


                <td><?php echo $pedidos['id'];?></td>
                <td><?php echo $pedidos['cliente'];?></td>
                <td><?php echo $pedidos['produto'];?></td>
                <td><?php echo $pedidos['quantidade'];?></td>
                <td><?php echo $pedidos['data'];?></td>
                <td>
                    <a href="editar_ped.php?id=<?php echo $pedidos['id'];?>" class="icone fas fa-edit"></a>

                     <a href="delete_ped.php?id=<?php echo $pedidos['id'];?>" class="icone fas fa-trash-alt"></a>
                   
                </td>
            </tr>
            
        
        <?php endforeach; ?>
    </table>

        
    </div>



</body>

</html>