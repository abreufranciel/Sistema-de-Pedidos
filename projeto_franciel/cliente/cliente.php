<?php 
require'../db/config.php';
session_start();
include'cliente.class.php';


$cliente = new Cliente();


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
    <title>Cliente</title>

</head>



<div class="container">

<h1>Painel de Cliente</h1>
    
    <div>
         <a href="../painel.php" class="back fas fa-backward"></a>   
        <a href="cad_cliente.php" class="botao btn btn-primary">Cadastrar Cliente</a>
        
    </div>





    <table class="table">
        
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>AÇÕES</th>
            </tr>
       
      
            <?php
             $lista = $cliente->getAll();
                 foreach($lista as $item):
            ?>
            <tr>


                <td><?php echo $item['id'];?></td>
                <td><?php echo $item['nome'];?></td>
                <td><?php echo $item['email'];?></td>
                <td>
                    <a href="editar.php?id=<?php echo $item['id'];?>" class="icone fas fa-edit"></a>

                     <a href="delete_cli.php?id=<?php echo $item['id'];?>" class="icone fas fa-trash-alt"></a>
                   
                </td>
            </tr>
            
        
        <?php endforeach; ?>
    </table>