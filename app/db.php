<?php

include_once 'conexao.php';

$sqlTabelaPublicidades = "CREATE TABLE IF NOT EXISTS publicidades (
    id integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    titulo varchar(150) NOT NULL,
    descricao varchar(255) NOT NULL, 
    imagem text NOT NULL,
    botao_link text NOT NULL,
    titulo_botao_link varchar(150) NOT NULL,
    sp_estado integer,
    mg_estado integer,
    rj_estado integer,
    dt_inicio date NOT NULL,
    dt_fim date NOT NULL
);";

$pdo->exec($sqlTabelaPublicidades); 
echo "Tabela criada! <br>";

$insertTabela = "INSERT INTO public.publicidades
(titulo, descricao, imagem, botao_link, titulo_botao_link, sp_estado, mg_estado, rj_estado, dt_inicio, dt_fim)
VALUES('Teste publicidade', 'Publicidade de teste', 'aniversario-de-sao-paulo-10-curiosidades-sobre-a-cidade.jpg', 'https://projeto-tributario.vercel.app/', 'Teste', 1, 1, NULL, '2025-06-30', '2025-07-30');";

$pdo->exec($insertTabela); 
echo "Registro criado! <br>";

$selectPublicidades="select * from publicidades";

$stmt = $pdo->prepare($selectPublicidades); 
$stmt->execute(); 
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($dados as $d):
    echo $d['id'] . "<br>";
    echo $d['titulo'] . "<br>";
endforeach;

?>