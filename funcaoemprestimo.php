<?php
include "emprestimos.php";
if (isset($_REQUEST['nome']) && isset($_REQUEST['livroemp']) && isset($_REQUEST['telefone']) && isset($_REQUEST['email']) && isset($_REQUEST['dataemp']) && isset($_REQUEST['datadev'])) {
    $nome     = $_REQUEST['nome'];
    $livro    = $_REQUEST['livroemp'];
    $telefone = $_REQUEST['telefone'];
    $email    = $_REQUEST['email'];
    $dtEmp    = $_REQUEST['dataemp'];
    $dtDev    = $_REQUEST['datadev'];
}
$xml = simplexml_load_file('acervo.xml');
for ($i = 0; $i < $xml->count(); $i++) {
    $titulolivro = ($xml->livro[$i]->titulo);
    if ($livro == $titulolivro) {
        
    }
}
?>