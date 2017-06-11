<?php
include "cadastro.php";
if (isset($_POST['funcao']) && $_POST['funcao'] == "Cadastrar") {
    $xml   = simplexml_load_file("acervo.xml");
    $livro = $xml->addChild('livro');
    if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
        
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
        $nome        = $_FILES['arquivo']['name'];
        
        // Pega a extensão
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        
        // Converte a extensão para minúsculo
        $extensao = strtolower($extensao);
        
        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid(time()) . '.' . $extensao;
            
            // Concatena a pasta com o nome
            $destino = 'C:\\xampp\\htdocs\\Acervo\\Imagens\\' . $novoNome;
            
            // tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino)) {
                $livro->addChild('imagem', $novoNome);
                echo ("<script> alert('Arquivo salvo com sucesso!); </script>");
                
            } else
                echo ("<script> alert('Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.); </script>");
        } else
            echo ("<script> alert('Você poderá enviar apenas arquivos *.jpg;*.jpeg;*.gif;*.png'); </script>");
    } else
        echo ("<script> alert('Você não enviou nenhum arquivo!'); </script>");
    
    
    $livro->addAttribute('ISBN', $_POST['ISBN']);
    $livro->addChild('titulo', $_POST['titulo']);
    $livro->titulo->addAttribute('edicao', $_POST['edicao']);
    $livro->addChild('categoria', $_POST['categoria']);
    $livro->addChild('autores', "");
    $livro->autores->addChild('autor', $_POST['nomeautor']);
    $livro->autores->autor->addAttribute('nacionalidade', $_POST['nacionalidade']);
    $livro->addChild('preco', $_POST['preco']);
    $livro->addChild('anopub', $_POST['pub']);
    $livro->addChild('editora', $_POST['editora']);
	
    
    file_put_contents("acervo.xml", $xml->asXML());

$isbn          = $_REQUEST['ISBN'];
$titulo        = $_REQUEST['titulo'];
$edicao        = $_REQUEST['edicao'];
$categoria     = $_REQUEST['categoria'];
$autor         = $_REQUEST['nomeautor'];
$nacionalidade = $_REQUEST['nacionalidade'];
$preco         = $_REQUEST['preco'];
$anopub        = $_REQUEST['pub'];
$editora       = $_REQUEST['editora'];

$conexao = mysql_connect('localhost', 'root');

if (mysql_select_db('acervo')){
    $sql = "INSERT INTO " . "livros (isbn, titulo, edicao, categoria, autor, nacionalidade, preco, anopub, editora) " . "VALUES ('$isbn', '$titulo', '$edicao', '$categoria', '$autor', '$nacionalidade', '$preco', '$anopub', '$editora')";
    mysql_query($sql);
} else {
    mysql_query("CREATE DATABASE acervo", $conexao);
    mysql_select_db('acervo');
    $criar = "CREATE TABLE livros(
isbn varchar(20) NOT NULL,
titulo varchar (50) NOT NULL,
edicao varchar (20) NOT NULL,
categoria varchar (20) NOT NULL,
autor varchar (20) NOT NULL,
nacionalidade varchar (20) NOT NULL,
preco varchar (20) NOT NULL,
anopub varchar (20) NOT NULL,
editora varchar (20) NOT NULL,
PRIMARY KEY (titulo)
)";
$criar2= "CREATE TABLE emprestimos(
nome varchar(20) NOT NULL,
livroemp varchar (50) NOT NULL,
telefone varchar (20) NOT NULL,
email varchar (20) NOT NULL,
dataemp date  ,
datadev date  ,
PRIMARY KEY (livroemp)
)";
    mysql_query($criar);
	mysql_query($criar2);
	
    $sql = "INSERT INTO " . "livros (isbn, titulo, edicao, categoria, autor, nacionalidade, preco, anopub, editora) " . "VALUES ('$isbn', '$titulo', '$edicao', '$categoria', '$autor', '$nacionalidade', '$preco', '$anopub', '$editora')";
    mysql_query($sql);
}
}
?> 