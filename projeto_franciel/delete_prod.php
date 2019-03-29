<?php
include'produto.class.php';

$produto = new Produto();

if (!empty($_GET['id'])){
    $id =$_GET['id'];

    $produto->drop_prod($id);
}

header("Location:produto.php");