<?php
$estado = $_POST['estadosSelect']
          ?? 'all'; 
        
$pesquisa = $_POST['pesquisar'] ?? ''; 

//encerra a validade da publi
if (isset($_POST['encerrar']) && isset($_POST['id_encerrar'])) {
  $id = (int)$_POST['id_encerrar'];
  $sqlUpdate = "UPDATE publicidades SET dt_fim = current_date - INTERVAL '1 day' WHERE id = :id";
  $stmt = $pdo->prepare($sqlUpdate);
  $stmt->execute([':id' => $id]);
}

if (isset($_POST['reativar']) && isset($_POST['id_reativar'])) {
  $id = (int)$_POST['id_reativar'];
  $sqlUpdate = "UPDATE publicidades SET dt_fim = current_date + INTERVAL '1 day' WHERE id = :id";
  $stmt = $pdo->prepare($sqlUpdate);
  $stmt->execute([':id' => $id]);
}

$selectPublicidades="
select 
id, titulo, descricao, imagem,
botao_link, titulo_botao_link, sp_estado, mg_estado,
rj_estado, to_char(dt_inicio, 'DD/MM/YYYY') as dt_inicio, to_char(dt_fim, 'DD/MM/YYYY') as dt_fim,
case when dt_fim < current_date then 'vencida' 
     when dt_fim >= current_date then 'valida' end as validade
from publicidades";

$filtroAtiv = " where dt_fim >= current_date";
$publiAtivas = $selectPublicidades . $filtroAtiv;

$filtroIn = " where dt_fim < current_date";
$publiInativas = $selectPublicidades . $filtroIn;

$estado = $_POST['estadosSelect'] ?? '';

if ($estado !== '' && $estado !== 'all') {
    $publiAtivas   .= " AND {$estado}_estado = 1";  
    $publiInativas .= " AND {$estado}_estado = 1";  
}

if ($estado === 'all' && $estado !== '') {
    $publiAtivas   .= " AND (sp_estado = 1 OR rj_estado = 1 OR mg_estado = 1)";  
    $publiInativas .= " AND (sp_estado = 1 OR rj_estado = 1 OR mg_estado = 1)";  
}

if($pesquisa !== ''){
    $publiAtivas   .= " AND titulo ilike '%$pesquisa%'";  
    $publiInativas .= " AND titulo ilike '%$pesquisa%'"; 
}

$stmt = $pdo->prepare($publiAtivas); 
$stmt->execute(); 
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmti = $pdo->prepare($publiInativas); 
$stmti->execute(); 
$dadosin = $stmti->fetchAll(PDO::FETCH_ASSOC);

?>