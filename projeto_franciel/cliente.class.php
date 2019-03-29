<?php
require'./db/config.php';



Class Cliente{

    private $pdo;
    private $email;
    private $nome;
    

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=projeto;host=localhost","root","");
    }

   

    /** realiza uma verificação se existe email e apos faza um insert no banco */
    public function create($nome,$email,$senha)
    {
        if ($this->existeEmail($email)== null) {
            $sql= $this->pdo->prepare("INSERT INTO usuario (nome,email,senha) VALUES(:nome,:email,:senha)");
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':email',$email);
            $sql->bindValue(':senha',$senha);
            $sql->execute();

            return true;
        }else {
            return false;
        }
    }

   
    /**faço uma seleção em todo banco, depois verifico para ver se tem  contato salvo 
     * e se caso tiver retorno todos arrays
    */
    public function getAll()
    {
      
        $sql=$this->pdo->prepare("SELECT * FROM usuario");
        $sql->execute();

        if ($sql->rowCount()>0) {
            return $sql->fetchAll();
        }else {
            return array();
        }

    }

   public function getInfo($id)
   {
        
        $sql=$this->pdo->prepare("SELECT * FROM usuario WHERE id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql->fetch();
            
        }else{
            return array();
        }

    }

    public function update($nome,$id)
    {
        $sql=$this->pdo->prepare("UPDATE usuario SET nome=:nome WHERE id=:id");
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':id',$id);
        $sql->execute();
    }
        
   


    public function drop($id)
    {
        
        $sql=$this->pdo->prepare("DELETE FROM usuario WHERE id=:id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        
    }

    public function existeEmail($email)
    {
            $sql=$this->pdo->prepare("SELECT * FROM usuario WHERE email=:email");
            $sql->bindValue(':email',$email);
            $sql->execute();

             
             if ($sql->rowCount()) {
                 return true;
             
             }else {
                 return false;
              }
        
    

    }

}