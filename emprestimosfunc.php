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