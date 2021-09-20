<?php

$conn = require __DIR__ .'/conexao.php';
//Melhorando a busca na tabela sql por texto
//A ENGINE=InnoDB a engine mais conhecida para banco de dados
$sql = '
    CREATE TABLE comments(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100) NOT NULL,
        comment TEXT NOT NULL,
        post_id INT NOT NULL,
        FOREIGN KEY (post_id) REFERENTES posts(id);
    )      
';

if ($conn->query($sql)) {
    die('Error: table exists');
}

$result = $conn->query('DESCRIBE comments');

var_dump($result->fetch_all());
//Criando relacionamentos one to one, one to many and belong to 