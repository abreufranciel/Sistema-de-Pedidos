<?php

/**Defino meu objeto de conexao se caso nao fizer a conexao esperada retorno um erro ao 
* usuario 
 */

 
try {
    $pdo= new PDO("mysql:dbname=projeto;host=localhost","root","");
} catch (PDOException $e) {
    echo'Falha ao conectar ao banco de dados!'.$e->getMessage();
}