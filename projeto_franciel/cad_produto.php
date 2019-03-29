<?php 
require'./db/config.php';
require'produto.class.php';


$produto = new Produto();

if (!empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $marca =addslashes($_POST['marca']);
    $quantidade = addslashes($_POST['quantidade']);

    $produto->create_prod($nome,$marca,$quantidade);

    header("Location:produto.php");

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
    <title>Adicionar Produto</title>


    <title>Produto</title>
</head>

<body>



    <div class="container">
    <h1 class="title_adc">Adicionar Produto</h1>

        <div class="form_login">
            <form method="POST">

                <div class="form-group ">
                    <label>nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Digite o nome do Produto" autocomplete="off">


                </div>


                <div class="form-group ">
                    <label>marca:</label>
                    <input type="text" name="marca" class="form-control" placeholder="Digite a Marca do Produto" autocomplete="off">


                </div>

                <div class="form-group">
                    <label>quantidade:</label>
                    <input type="text" name="quantidade" class="form-control" placeholder="Digite a Quantidade" autocomplete="off">
                </div>

                <button type="submit" value="adicionar" class="btn btn-primary">adicionar</button>

            </form>


        </div>
    </div>



</body>

</html>