<?php 
require'../db/config.php';
require'cliente.class.php';


$cliente = new Cliente();

if (!empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email =addslashes($_POST['email']);
    $senha = addslashes(md5($_POST['senha']));

    $cliente->create($nome,$email,$senha);

    header("Location:cliente.php");

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Adicionar Cliente</title>


   
</head>

<body>



    <div class="container">
    <h1 class="title_adc">Adicionar Cliente</h1>

        <div class="form_login">
            <form method="POST">

                <div class="form-group ">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Digite seu Nome" autocomplete="off">


                </div>


                <div class="form-group ">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu Email" autocomplete="off">


                </div>

                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua Senha" autocomplete="off">
                </div>

                <button type="submit" value="adicionar" class="btn btn-primary">Entrar</button>

            </form>


        </div>
    </div>



</body>

</html>