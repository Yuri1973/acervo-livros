<?php
include "mostra.php";
function mostraquais()
{
    if (isset($_POST['funcao']) && $_POST['funcao'] == "Ver todos") {
        $xml = simplexml_load_file('acervo.xml');
        for ($i = 0; $i < $xml->count(); $i++) {
            echo "<fieldset><div class=\"livros\"><p class=\"titulo\"> Título: </p><p>" . strval($xml->livro[$i]->titulo) . "</br></p>";
            echo "<p class=\"isbn\"> ISBN: " . strval($xml->livro[$i]['ISBN']) . "</br></p>";
            echo "<p class=\"edicao\"> Edição: " . strval($xml->livro[$i]->titulo['edicao']) . "</br></p>";
            echo "<p class=\"categ\"> Categoria: " . strval($xml->livro[$i]->categoria) . "</br></p>";
            echo "<p class=\"autor\"> Autores: ";
            for ($j = 0; $j < $xml->livro[$i]->autores->count(); $j++) {
                echo strval($xml->livro[$i]->autores[$j]->autor);
                echo "(" . $xml->livro[$i]->autores[$j]->autor['nacionalidade'] . ")";
            }
            echo "<p class=\"valor\"> Preço: " . strval($xml->livro[$i]->preco) . "</br></p>";
            echo "<p class=\"publ\"> Ano de Publicação: " . strval($xml->livro[$i]->anopub) . "</br></p>";
            echo "<p class=\"editora\"> Editora: " . strval($xml->livro[$i]->editora) . "</br></p>";
            echo "</div> <div class=\"foto\"><img src='Imagens\\" . strval($xml->livro[$i]->imagem) . "'></td>";
            echo "<hr/></div></fieldset>";
        }
    }
    
    if (isset($_POST['funcao']) && $_POST['funcao'] == "Mostrar por preço") {
        
        $xml = simplexml_load_file('acervo.xml');
        if (isset($_POST['pesqp'])) {
            $valor = $_POST['pesqp'];
        }
        for ($i = 0; $i < $xml->count(); $i++) {
            $preco = floatval($xml->livro[$i]->preco->__toString());
            if ($valor == '30') {
                if ($preco < 30) {
                    echo "<fieldset><div class=\"livros\"><p class=\"titulo\"> Título: " . strval($xml->livro[$i]->titulo) . "</br></p>";
                    echo "<p class=\"isbn\"> ISBN: " . strval($xml->livro[$i]['ISBN']) . "</br></p>";
                    echo "<p class=\"edicao\"> Edição: " . strval($xml->livro[$i]->titulo['edicao']) . "</br></p>";
                    echo "<p class=\"categ\"> Categoria: " . strval($xml->livro[$i]->categoria) . "</br></p>";
                    echo "<p class=\"autor\"> Autores: ";
                    for ($j = 0; $j < $xml->livro[$i]->autores->count(); $j++) {
                        echo strval($xml->livro[$i]->autores[$j]->autor);
                        echo "(" . $xml->livro[$i]->autores[$j]->autor['nacionalidade'] . ")";
                    }
                    echo "<p class=\"valor\"> Preço: " . strval($xml->livro[$i]->preco) . "</br></p>";
                    echo "<p class=\"publ\"> Ano de Publicação: " . strval($xml->livro[$i]->anopub) . "</br></p>";
                    echo "<p class=\"editora\"> Editora: " . strval($xml->livro[$i]->editora) . "</br></p>";
                    echo "</div> <div class=\"foto\"><img src='Imagens\\" . strval($xml->livro[$i]->imagem) . "'></td>";
                    echo "<hr/></div></fieldset>";
                    
                }
            }
            if ($valor == '30_50') {
                if ($preco >= 30 && $preco <= 50) {
                    echo "<fieldset><div class=\"livros\"><p class=\"titulo\"> Título: " . strval($xml->livro[$i]->titulo) . "</br></p>";
                    echo "<p class=\"isbn\"> ISBN: " . strval($xml->livro[$i]['ISBN']) . "</br></p>";
                    echo "<p class=\"edicao\"> Edição: " . strval($xml->livro[$i]->titulo['edicao']) . "</br></p>";
                    echo "<p class=\"categ\"> Categoria: " . strval($xml->livro[$i]->categoria) . "</br></p>";
                    echo "<p class=\"autor\"> Autores: ";
                    for ($j = 0; $j < $xml->livro[$i]->autores->count(); $j++) {
                        echo strval($xml->livro[$i]->autores[$j]->autor);
                        echo "(" . $xml->livro[$i]->autores[$j]->autor['nacionalidade'] . ")";
                    }
                    echo "<p class=\"valor\"> Preço: " . strval($xml->livro[$i]->preco) . "</br></p>";
                    echo "<p class=\"publ\"> Ano de Publicação: " . strval($xml->livro[$i]->anopub) . "</br></p>";
                    echo "<p class=\"editora\"> Editora: " . strval($xml->livro[$i]->editora) . "</br></p>";
                    echo "</div> <div class=\"foto\"><img src='Imagens\\" . strval($xml->livro[$i]->imagem) . "'></td>";
                    echo "<hr/></div></fieldset>";
                }
            } else {
                if ($preco >= 51) {
                    echo "<fieldset><div class=\"livros\"><p class=\"titulo\"> Título: " . strval($xml->livro[$i]->titulo) . "</br></p>";
                    echo "<p class=\"isbn\"> ISBN: " . strval($xml->livro[$i]['ISBN']) . "</br></p>";
                    echo "<p class=\"edicao\"> Edição: " . strval($xml->livro[$i]->titulo['edicao']) . "</br></p>";
                    echo "<p class=\"categ\"> Categoria: " . strval($xml->livro[$i]->categoria) . "</br></p>";
                    echo "<p class=\"autor\"> Autores: ";
                    for ($j = 0; $j < $xml->livro[$i]->autores->count(); $j++) {
                        echo strval($xml->livro[$i]->autores[$j]->autor);
                        echo "(" . $xml->livro[$i]->autores[$j]->autor['nacionalidade'] . ")";
                    }
                    echo "<p class=\"valor\"> Preço: " . strval($xml->livro[$i]->preco) . "</br></p>";
                    echo "<p class=\"publ\"> Ano de Publicação: " . strval($xml->livro[$i]->anopub) . "</br></p>";
                    echo "<p class=\"editora\"> Editora: " . strval($xml->livro[$i]->editora) . "</br></p>";
                    echo "</div> <div class=\"foto\"><img src='Imagens\\" . strval($xml->livro[$i]->imagem) . "'></td>";
                    echo "<hr/></div></fieldset>";
                    
                }
            }
        }
        
    }
    if (isset($_POST['funcao']) && $_POST['funcao'] == "Mostrar por categoria") {
        
        $xml = simplexml_load_file('acervo.xml');
        if (isset($_POST['pesqcat'])) {
            $categ = $_POST['pesqcat'];
            
            for ($i = 0; $i < $xml->count(); $i++) {
                $categoria = ($xml->livro[$i]->categoria);
                if ($categ == $categoria) {
                    echo "<fieldset><div class=\"livros\"><p class=\"titulo\"> Título: " . strval($xml->livro[$i]->titulo) . "</br></p>";
                    echo "<p class=\"isbn\"> ISBN: " . strval($xml->livro[$i]['ISBN']) . "</br></p>";
                    echo "<p class=\"edicao\"> Edição: " . strval($xml->livro[$i]->titulo['edicao']) . "</br></p>";
                    echo "<p class=\"categ\"> Categoria: " . strval($xml->livro[$i]->categoria) . "</br></p>";
                    echo "<p class=\"autor\"> Autores: ";
                    for ($j = 0; $j < $xml->livro[$i]->autores->count(); $j++) {
                        echo strval($xml->livro[$i]->autores[$j]->autor);
                        echo "(" . $xml->livro[$i]->autores[$j]->autor['nacionalidade'] . ")";
                    }
                    echo "<p class=\"valor\"> Preço: " . strval($xml->livro[$i]->preco) . "</br></p>";
                    echo "<p class=\"publ\"> Ano de Publicação: " . strval($xml->livro[$i]->anopub) . "</br></p>";
                    echo "<p class=\"editora\"> Editora: " . strval($xml->livro[$i]->editora) . "</br></p>";
                    echo "</div> <div class=\"foto\"><img src='Imagens\\" . strval($xml->livro[$i]->imagem) . "'></td>";
                    echo "<hr/></div></fieldset>";
                    
                }
            }
            
        }
    }
}
?>