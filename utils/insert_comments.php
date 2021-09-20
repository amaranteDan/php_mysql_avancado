<?php 

$conn = require __DIR__.'/conexao.php';

$conn->query('TRUNCATE posts');

//Aqui fazendo a consulta do sql usando arquivo
$sql = file_get_contents( __DIR__.'/insert_comments.sql');

$conn->begin_transaction();//Iniciando a transação para o INNODB
$conn->query($sql);

if ($save){
    $conn->commit();
} else {
    $conn->rollback();
}



echo 'Starting Select' .PHP_EOL;//end of line


$result = $conn->query('SELECT * FROM comments');

$comments = $result->fetch_all(MYSQLI_ASSOC);

foreach($comments as $post){
    echo $post['email'].PHP_EOL;//end of line
    echo $post['comment'].PHP_EOL;//end of line
    echo $post['post_id'].PHP_EOL;//end of line
    echo PHP_EOL;//end of line


}
echo 'END OF SELECT' . PHP_EOL;//end of