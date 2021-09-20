<?php 
/**
 * $debug -> Em desenvolvimento sempre usamos como true
 * Em produção usamos como false para não gerar erros para o cliente
 */
$debug = true; 

if($debug){
    mysqli_report(MYSQLI_REPORT_ERROR);//Mostra o erro
}else{
    mysqli_report(MYSQLI_REPORT_OFF);//Oculta o erro
}

$conn = new mysqli("localhost", 'dublin', '1234', 'php_mysql_avancando');

if ($conn->connect_errno){
    die('Falhou a conexao ao Banco de Dados' . $conn->connect_errno);
}
return $conn;
