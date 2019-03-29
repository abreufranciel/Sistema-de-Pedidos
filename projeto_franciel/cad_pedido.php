<?php 
require'./db/config.php';
require'cliente.class.php';
require'produto.class.php';
require'pedido.class.php';

$cliente = new Cliente();
$produto = new Produto();
$pedido = new Pedido();

if (!empty($_POST['quantidade'])) {
    $id_Cliente = addslashes($_POST['nomeCliente']);
    $id_Produto =addslashes($_POST['nomeProduto']);
    $quantidade = addslashes($_POST['quantidade']);

    $pedido->criarPedido($id_Cliente,$id_Produto,$quantidade,$date = date ("Y-m-d"));

    header("Location:pedido.php");

}



?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Adicionar Pedido</title>


    <title>Pedido</title>
</head>

<body>



    <div class="container">
    <h1 class="title_adc">Adicionar Pedido</h1>

        <div class="form_login">
            <form method="POST">

                <div class="form-group ">
                    <label>Nome do Cliente:</label>                                        
                     <select name="nomeCliente" class="form-control">
                        <?php
                            $clienteLista = $cliente->getAll();
                            foreach ($clienteLista as $oCliente) {
                                ?>
                                    <option value="<?php echo $oCliente['id']; ?>"><?php echo $oCliente['nome']; ?></option>
                                <?php
                            }
                        ?>
                    </select>                                   
                </div>


                <div class="form-group ">
                    <label>Nome do Produto:</label>                   
                    <select name="nomeProduto" class="form-control">
                        <?php
                            $produtoLista = $produto->todosProduto();
                            foreach ($produtoLista as $oProduto) {
                                ?>
                                    <option value="<?php echo $oProduto['id']; ?>"><?php echo $oProduto['nome']; ?></option>
                                <?php
                            }
                        ?>
                    </select>   
                </div>

                <div class="form-group">
                    <label>quantidade:</label>
                    <input type="text" name="quantidade" class="form-control" placeholder="Digite a quantidade">
                </div>

                <button type="submit" value="adicionar" class="btn btn-primary">salvar</button>

            </form>


        </div>
    </div>



</body>

</html>