<?php 

$conn = require __DIR__.'/conexao.php';

$one_to_one = 'SELECT * FROM posts LEFT JOIN comments ON posts.id = comments.post_id WHERE posts.id = 1 GROUP BY posts.id;';
$one_to_many = 'SELECT * FROM posts LEFT JOIN comments ON posts.id = comments.post_id WHERE posts.id = 1 GROUP BY posts.id;';
$belong_to = 'SELECT * FROM posts RIGHT JOIN comments ON posts.id = comments.post_id WHERE posts.id = 1 GROUP BY posts.id;';

$result  = $conn->query($one_to_many);

$posts = $result->fecth_all(MYSQLI_ASSOC);

var_dump($posts);
exit;