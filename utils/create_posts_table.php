<?php

$conn = require __DIR__ .'/conexao.php';
//Melhorando a busca na tabela sql por texto
//A ENGINE=InnoDB a engine mais conhecida para banco de dados
$sql = '
    CREATE TABLE posts(
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        body TEXT NOT NULL,
        FULLTEXT KEY title (title, body)
    )      
';

if ($conn->query($sql)) {
    die('Error: tables exists');
}

$result = $conn->query('DESCRIBE posts');

var_dump($result->fetch_all());
