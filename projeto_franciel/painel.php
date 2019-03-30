<?php
include'./db/config.php';

session_start();

if (empty($_SESSION['logado'])) {
    header("Location:index.php");
}




?>



<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>painel</title>

</head>

<div>
    <a class="sair fas fa-sign-out-alt" href="logout.php"></a>
</div>
<div class="header_topo">
    
    
</div>

<div class="container_sidebar">
    <div class="siderbar">
        <div class="menu">
            <ul>
                <li><a href="./cliente/cliente.php">Cliente</a></li>
                <li><a href="./produto/produto.php">Produto</a></li>
                <li><a href="./pedido/pedido.php">Pedidos</a></li>
            </ul>
        </div>


    </div>
    <div class="content">
        <h1>Painel Administrativo</h1>


        <div class="box">
            <div class="box-top">NEWS</div>
            <div class="box-painel">Simples painel</div>
        </div>

    </div>
</div>

<body>

</body>

</html>