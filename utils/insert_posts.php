<?php 

$conn = require __DIR__.'/conexao.php';

$conn->query('TRUNCATE posts');

//Aqui fazendo a consulta do sql usando arquivo
$sql = file_get_contents( __DIR__.'/insert_posts.sql');

$conn->begin_transaction();//Iniciando a transação para o INNODB

$conn->query($sql);
$conn->commit();

echo 'Starting Select' .PHP_EOL;//end of line


$result = $conn->query('SELECT * FROM posts');

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){
    echo $post['title'].PHP_EOL;//end of line
    echo $post['body'].PHP_EOL;//end of line
    echo PHP_EOL;//end of line


}
echo 'END OF SELECT' . PHP_EOL;//end of