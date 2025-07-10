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
);

ALTER TABLE public.publicidades ADD padrao int4 NULL;
";

$pdo->exec($sqlTabelaPublicidades); 
echo "Tabela publicidades criada! <br>";

$sqlTabelaCadEstados = "CREATE TABLE IF NOT EXISTS cad_estado (
    id integer GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    descricao varchar(255) NOT NULL,
    uf varchar(3) NOT NULL
);

CREATE UNIQUE INDEX cad_estado_descricao_idx ON public.cad_estado (descricao);";

$pdo->exec($sqlTabelaCadEstados); 
echo "Tabela cad_estado criada! <br>";

$insertEstado = "INSERT INTO public.cad_estado
(descricao,uf) values
('São Paulo', 'SP'),
('Rio de Janeiro', 'RJ'),
('Minas Gerais', 'MG');
";

$pdo->exec($insertEstado); 
echo "Estados criados! <br>";

$insertTabela = "INSERT INTO public.publicidades
(titulo, descricao, imagem, botao_link, titulo_botao_link, sp_estado, mg_estado, rj_estado, dt_inicio, dt_fim)
VALUES('Teste publicidade', 'Publicidade de teste', 'aniversario-de-sao-paulo-10-curiosidades-sobre-a-cidade.jpg', 'https://projeto-tributario.vercel.app/', 'Teste', 1, 1, 0, '2025-06-30', '2025-07-30');";

$pdo->exec($insertTabela); 
echo "Registro criado! <br>";

$selectEstados="select * from cad_estado";

$stme = $pdo->prepare($selectEstados); 
$stme->execute(); 
$est = $stme->fetchAll(PDO::FETCH_ASSOC);

foreach($est as $e):
    echo $e['descricao'] . "<br>";
    echo $e['uf'] . "<br>";
endforeach;

$selectPublicidades="select * from publicidades";

$stmt = $pdo->prepare($selectPublicidades); 
$stmt->execute(); 
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($dados as $d):
    echo $d['id'] . "<br>";
    echo $d['titulo'] . "<br>";
endforeach;

?>