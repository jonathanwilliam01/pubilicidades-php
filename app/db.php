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
echo 'Tabela criada!';

?>