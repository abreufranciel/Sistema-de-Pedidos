<?php 
require'./db/config.php';
session_start();



if (!empty($_POST['email'])) {
    $email=addslashes($_POST['email']);
    $senha=addslashes(md5($_POST['senha']));

        

    $sql=$pdo->prepare("SELECT * FROM usuario WHERE email=:email AND senha=:senha");

    $sql->bindValue(':email',$email);
    $sql->bindValue(':senha',$senha);
    $sql->execute();

    if ($sql->rowCount()>0) {
        $sql = $sql->fetch();
            
           			
		$_SESSION['logado'] = $sql['id'];

		header("Location:painel.php");
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Login</title>


    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="form_login">
            <form method="POST">

                <div class="form-group ">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu email">


                </div>

                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua Senha">
                </div>

                <button type="submit" value="entrar" class="btn btn-primary">Entrar</button>

            </form>


        </div>
    </div>



</body>

</html>