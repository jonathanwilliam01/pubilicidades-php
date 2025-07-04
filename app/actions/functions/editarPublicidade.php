<?php

$id = (int) ($_GET['id'] ?? 0);

$selectPublicidades="
select 
id, titulo, descricao, imagem,
botao_link, titulo_botao_link, sp_estado, mg_estado,
rj_estado, dt_inicio, dt_fim,
case when dt_fim < current_date then 'vencida' 
     when dt_fim >= current_date then 'valida' end as validade
from publicidades
where id = $id";


$stmt = $pdo->prepare($selectPublicidades); 
$stmt->execute(); 
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['atualizar'])){
     $id          = (int)$_POST['id'];
     $titulo      = $_POST['titulo'];
     $descricao   = $_POST['descricao'];
     $tituloBotao = $_POST['tit-botao'];
     $linkBotao   = $_POST['link-botao'];
     $sp          = (int)$_POST['sp'];
     $rj          = (int)$_POST['rj'];
     $mg          = (int)$_POST['mg'];
     $dtInicio    = $_POST['dt-ini-publi'];
     $dtFim       = $_POST['dt-fim-publi'];     

$sqlupdate = "update publicidades set 
titulo = :titulo, descricao = :descricao, titulo_botao_link = :titulo_botao,
botao_link = :botao_link, sp_estado = :sp, mg_estado = :mg, rj_estado = :rj,
dt_inicio = :dt_inicio, dt_fim = :dt_fim
where id = :id";

$upd = $pdo->prepare($sqlupdate);
$upd->execute([
                    ':titulo'       => $titulo,
                    ':descricao'    => $descricao,
                    ':id'           => $id,
                    //':imagem'       => $Img,
                    ':titulo_botao' => $tituloBotao,
                    ':botao_link'   => $linkBotao,
                    ':sp'    => $sp,
                    ':mg'    => $mg,
                    ':rj'    => $rj,
                    ':dt_inicio'    => $dtInicio,
                    ':dt_fim'       => $dtFim
]);

header('location: ../index.php');
};

if(isset($_POST['delete'])){
     $id = (int)$_GET['id'];

$sqldelete = "delete from publicidades where id = :id";

$del = $pdo->prepare($sqldelete);
$del->execute([
                    ':id'           => $id
]);

header('location: ../index.php');
};

// //usado pra debugar o update
// if (isset($_POST['atualizar'])) {
//     var_dump($_POST); // veja tudo que chegou
//     // exit; // comente depois de confirmar

//     $id = (int)$_POST['id'];
//     $titulo = $_POST['titulo'] ?? '';

//     $upd = $pdo->prepare('UPDATE publicidades SET titulo = :t WHERE id = :id');
//     $upd->execute([':t' => $titulo, ':id' => $id]);

//     echo 'Linhas afetadas: '.$upd->rowCount();
//     exit;
// }

include_once './editarPublicidade.php';

?>