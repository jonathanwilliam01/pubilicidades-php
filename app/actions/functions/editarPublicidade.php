<?php

$selectPublicidades="
select 
id, titulo, descricao, imagem,
botao_link, titulo_botao_link, sp_estado, mg_estado,
rj_estado, dt_inicio, dt_fim,
case when dt_fim < current_date then 'vencida' 
     when dt_fim >= current_date then 'valida' end as validade
from publicidades
where id = $_GET[id]";


$stmt = $pdo->prepare($selectPublicidades); 
$stmt->execute(); 
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['confirmar'])){
     $titulo      = $_POST['titulo'];
     $descricao   = $_POST['descricao'];
     $tituloBotao = $_POST['tit-botao'];
     $linkBotao   = $_POST['link-botao'];
     $sp          = (int)$_POST['sp'];
     $rj          = (int)$_POST['rj'];
     $mg          = (int)$_POST['mg'];
     $dtInicio    = $_POST['dt-ini-publi'];
     $dtFim       = $_POST['dt-fim-publi'];     
}

?>