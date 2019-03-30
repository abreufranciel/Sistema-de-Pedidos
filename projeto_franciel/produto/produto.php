<?php
require'../db/config.php';
session_start();
include'produto.class.php';



if (empty($_SESSION['logado'])) {
    header("location:login.php");
}

$produto = new Produto();
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Produto</title>

</head>



<div class="container">
    <h1>Painel Produto</h1>

    <div>
    <a href="../painel.php" class="back fas fa-backward"></a>  
        <a href="cad_produto.php" class="botao btn btn-primary">Cadastrar Produto</a>
    </div>

    <table class="table">
        
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>MARCAL</th>
                <th>QUANTIDADE</th>
                <th>AÇÕES</th>
            </tr>
       
      
            <?php
             $prolista = $produto->todosProduto();
                 foreach($prolista as $prod):
            ?>
            <tr>


                <td><?php echo $prod['id'];?></td>
                <td><?php echo $prod['nome'];?></td>
                <td><?php echo $prod['marca'];?></td>
                <td><?php echo $prod['quantidade'];?></td>
                <td>
                    <a href="editar_prod.php?id=<?php echo $prod['id'];?>" class="icone fas fa-edit"></a>

                     <a href="delete_prod.php?id=<?php echo $prod['id'];?>" class="icone fas fa-trash-alt"></a>
                   
                </td>
            </tr>
            
        
        <?php endforeach; ?>
    </table>