<?php 

$conn = require __DIR__.'/conexao.php';

$term = $argv[1] ?? null; //octalese usado a partir da versao 7.
$term = '%'.$term.'%'; //Usando um caracter coringa para na buscar trazer todos os resultados
//protegendo a query contra SQLInjection

$stmt = $conn->prepare('SELECT *, MATCH(title, body) AGAINST(? IN BOOLEAN MODE) as score FROM posts ORDER BY score DESC;');
$stmt->bind_param('s', $term);
$stmt->execute();

$result = $stmt->get_result();
$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach ($posts as $post){
    echo $post['title']. PHP_EOL;
    echo $post['body']. PHP_EOL;
    echo $post['score']. PHP_EOL;
    echo PHP_EOL;
}
