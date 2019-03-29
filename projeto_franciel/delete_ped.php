<?php
include'pedido.class.php';

$pedido = new Pedido();

if (!empty($_GET['id'])){
    $id =$_GET['id'];

    $pedido->drop_pedido($id);
}

header("Location:pedido.php");


