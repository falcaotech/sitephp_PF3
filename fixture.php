<?php

header('Content-Type: text/html; charset=utf-8');

require_once "conexao.php";

echo "#### Executando a Fixture ####<br>";

$conn = conexao();

echo "Removendo tabela<br>";
$conn->query("DROP TABLE IF EXISTS pagina;");
echo " - OK\n";

echo "Criando a tabela";

$conn->query("CREATE TABLE pagina (
                id INT NOT NULL AUTO_INCREMENT,
                uri VARCHAR(45) NOT NULL,
                nome VARCHAR(45) NOT NULL,
                resumo VARCHAR(45) NOT NULL,
                conteudo VARCHAR(455) NOT NULL,
                PRIMARY KEY (id))
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci;");

echo" - OK\n";

echo "Inserindo dados";
for($x = 0; $x <= 9; $x++){
    
    // Criando as variveis que sero inseridas
    $uri = 'pagina';
    $nome = "Pagina {$x}";
    $resumo = 'Resumo da página.';
    $conteudo = 'É um fato conhecido  de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de \"Conteúdo aqui, conteúdo aqui\", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por \'lorem ipsum\' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).';
    
    // Prepara o comando que ser executado no banco
    $smt = $conn->prepare("INSERT INTO pagina (uri, nome, resumo, conteudo) VALUES (:uri, :nome, :resumo, :conteudo)");
    // Trata os parametros presentes no comando
    $smt->bindParam(":uri", $uri);
    $smt->bindParam(":nome", $nome);
    $smt->bindParam(":resumo", $resumo);
    $smt->bindParam(":conteudo", $conteudo);
    
    // Excuta o comando
    $smt->execute();
    
    // Exibe a ultima id inserida no banco de dados
    echo $conn->lastInsertId();

    echo " - OK\n";
    echo "#### Concluído ####<br>";
}
?>