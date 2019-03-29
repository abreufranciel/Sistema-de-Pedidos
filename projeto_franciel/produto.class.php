<?php
require'./db/config.php';



Class Produto{

    private $pdo;
    private $nome;
    private $marca;
    private $quantidade;
    

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=projeto;host=localhost","root","");
    }

   

    /** realiza uma verificação se existe produto e apos faza um insert no banco */
    public function create_prod($nome,$marca,$quantidade)
    {
        if ($this->existeProduto($id)== null) {
            $sql= $this->pdo->prepare("INSERT INTO produto (nome,marca,quantidade) VALUES(:nome,:marca,:quantidade)");
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':marca',$marca);
            $sql->bindValue(':quantidade',$quantidade);
            $sql->execute();

            return true;
        }else {
            return false;
        }
    }

   
    /**faço uma seleção em todo banco, depois verifico para ver se tem  contato salvo 
     * e se caso tiver retorno todos arrays
    */
    public function todosProduto()
    {
      
        $sql=$this->pdo->prepare("SELECT * FROM produto");
        $sql->execute();

        if ($sql->rowCount()>0) {
            return $sql->fetchAll();
        }else {
            return array();
        }

    }

   public function getInfoProd($id)
   {
        
        $sql=$this->pdo->prepare("SELECT * FROM produto WHERE id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql->fetch();
            
        }else{
            return array();
        }

    }

    public function update_prod($nome,$marca,$quantidade,$id)
    {
        $sql=$this->pdo->prepare("UPDATE produto SET nome=:nome,marca=:marca,quantidade=:quantidade WHERE id=:id");
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':marca',$marca);
        $sql->bindValue(':quantidade',$quantidade);
        $sql->bindValue(':id',$id);
        $sql->execute();
    }
        
   


    public function drop_prod($id)
    {
        
        $sql=$this->pdo->prepare("DELETE FROM produto WHERE id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        
    }

    public function existeProduto($id)
    {
            $sql=$this->pdo->prepare("SELECT * FROM produtos WHERE id=:id");
            $sql->bindValue(':id',$id);
            $sql->execute();

             
             if ($sql->rowCount()) {
                 return true;
             
             }else {
                 return false;
              }
        
    

    }

}