<?php
include'cliente.class.php';

$cliente = new Cliente();

if (!empty($_GET['id'])){
    $id =$_GET['id'];

    $cliente->drop($id);
}

header("Location:cliente.php");
