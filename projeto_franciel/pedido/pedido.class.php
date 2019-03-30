<?php
require'../db/config.php';



Class Pedido{

    private $pdo;
    private $data;
    private $id_cliente;
    private $id_produto;
    

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=projeto;host=localhost","root","");
    }

   
    //verifico se existe cliente
    public function existeUser($id,$id_cliente)
    {
        $sql=$this->pdo->prepare("SELECT * FROM usuario WHERE id=:id");
        $sql->bindValue(':id',$id__cliente);
        $sql->execute();

         
         if ($sql->rowCount()>0) {
             return true;
         
         }else {
             return false;
          }
    }




    //verefico se existe produto
    public function existeProduto($id,$id__produto)
    {
        $sql=$this->pdo->prepare("SELECT * FROM produto WHERE id=:id");
        $sql->bindValue(':id',$id__produto);
        $sql->execute();

         
         if ($sql->rowCount()>0) {
             return true;
         
         }else {
             return false;
          }
    }




    public function criarPedido($id_cliente,$id_produto,$quantidade,$date)    
    {
        $sql=$this->pdo->prepare("INSERT INTO pedido (id_cliente,id_produto,quantidade, data) VALUES(:id_cliente,:id_produto,:quantidade,:data)");
        $sql->bindValue(':id_cliente',$id_cliente);
        $sql->bindValue(':id_produto',$id_produto);
        $sql->bindValue(':quantidade',$quantidade);
        $sql->bindValue(':data',$date);
        $sql->execute();
        
    }

    public function todosPedido()
    {
        $sql=$this->pdo->prepare("SELECT
                                    ped.id AS id,
                                    cli.nome AS cliente,
                                    pro.nome AS produto,
                                    ped.quantidade AS quantidade,
                                    ped.data AS data
                                  FROM
                                    pedido AS ped
                                  INNER JOIN
                                    usuario AS cli on ped.id_cliente = cli.id
                                  INNER JOIN
                                    produto AS pro on ped.id_produto = pro.id");

        $sql->execute();

        if ($sql->rowCount()>0) {
            return $sql->fetchAll();
        }else {
            return array();
        }      
    }

    public function drop_pedido($id)
    {
        
        $sql=$this->pdo->prepare("DELETE FROM pedido WHERE id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        
    }



}




