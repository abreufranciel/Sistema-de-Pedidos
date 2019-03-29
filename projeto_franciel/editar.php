<?php 
require'./db/config.php';
require'cliente.class.php';


$cliente = new Cliente();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $info = $cliente->getInfo($id);

    if (empty(['email'])) {
        header("Location:cliente.php");
    }

}else {
    header("Location:cliente.php");
}



if (!empty($_POST['id'])) {
    $nome = $_POST['nome'];
    $id = $_POST['id'];

    $cliente->update($nome,$id);

    header("Location:cliente.php");


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
    <title>Editar Usuario</title>


    <title>Login</title>
</head>

<body>



    <div class="container">
        <h1 class="title_adc">Editar Usuario</h1>


        <div class="form_login">
            <form method="POST" class="form_login" >

                <input type="hidden" name="id" value="<?php echo $info['id']; ?>" class="form-group">

                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $info['nome'];?>">

                <div class="form-group ">
                 <label>Email:</label>
                <?php echo $info['email'];?>
                </div>

                <button type="submit" value="salvar" class="btn btn-primary">salvar</button>

           
            </form>


             


           

        </form>
    </div>


    




</body>

</html>