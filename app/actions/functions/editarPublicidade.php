<?php

$selectPublicidades="
select 
id, titulo, descricao, imagem,
botao_link, titulo_botao_link, sp_estado, mg_estado,
rj_estado, to_char(dt_inicio, 'DD/MM/YYYY') as dt_inicio, to_char(dt_fim, 'DD/MM/YYYY') as dt_fim,
case when dt_fim < current_date then 'vencida' 
     when dt_fim >= current_date then 'valida' end as validade
from publicidades
where id = $_GET[id]";


$stmt = $pdo->prepare($selectPublicidades); 
$stmt->execute(); 
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>