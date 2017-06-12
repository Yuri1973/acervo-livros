<?php
include "emprestimos.php";
if (isset($_POST['funcao']) && $_POST['funcao'] == "Emprestar") {
$nome          = $_REQUEST['nome'];
$livroemp        = $_REQUEST['livroemp'];
$telefone        = $_REQUEST['telefone'];
$email     = $_REQUEST['email'];
$dtEmp         = $_REQUEST['dtemp'];
$dtDev         = $_REQUEST['dtdev'];

$conexao = mysql_connect('localhost', 'root');

if (mysql_select_db('acervo')){
    $sql = "INSERT INTO " . "emprestimos (nome, livroemp, telefone, email, dataemp, datadev) " . "VALUES ('$nome', '$livroemp', '$telefone', '$email', '$dtEmp', '$dtDev')";
    mysql_query($sql);
}
}
if (isset($_POST['funcao']) && $_POST['funcao'] == "Enviar emails") {
	$con = mysql_connect('localhost', 'root') or
       die('Não foi possível conectar');
   
   mysql_select_db("acervo", $con);
   
   $result = mysql_query('SELECT * FROM emprestimos');
   
  while($row = mysql_fetch_array($result)) {
  
  $email= $row['email'];
  $data=  $row ['datadev'];
  $dataatual=  date("Y-m-d");
  if ($dataatual - $data <5){
				$from= 'ana.lopessouza@gmail.com';
				$to= $email;
				$subject= 'Devolução de Livro';
				$body = 'Faltam menos de 5 dias para devolver meu livro!';
				
					mail($to, $subject, $body, $from);
  
  
				
  }}
}?>