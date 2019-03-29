<?php 
require'./db/config.php';
require'produto.class.php';


$produto = new Produto();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $prod = $produto->getInfoProd($id);

    if (empty(['nome'])) {
        header("Location:produto.php");
    }

}else {
    header("Location:produto.php");
}



if (!empty($_POST['id'])) {
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $quantidade = $_POST['quantidade'];
    $id = $_POST['id'];

    $produto->update_prod($nome,$marca,$quantidade,$id);

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
    <title>Editar Produto</title>


    <title>Login</title>
</head>

<body>



    <div class="container">
        <h1 class="title_adc">Editar Usuario</h1>


        

            <div class="form_login">
                 <form method="POST" class="form_login" >

                <input type="hidden" name="id" value="<?php echo $prod['id']; ?>" class="form-group">

                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $prod['nome'];?>">

                
                <label>marca:</label>
                <input type="text" name="marca" class="form-control" value="<?php echo $prod['marca'];?>">
                
                <label>quantidade:</label>
                <input type="text" name="quantidade" class="form-control" value="<?php echo $prod['quantidade'];?>">

                <button type="submit" value="salvar" class="btn btn-primary">salvar</button>

           
            </form>

        </h1>
    </div>


    




</body>

</html>