<?php
            if (isset($_POST['confirmar'])) {
                    $titulo      = $_POST['titulo'];
                    $descricao   = $_POST['descricao'];
                    $tituloBotao = $_POST['tit-botao'];
                    $linkBotao   = $_POST['link-botao'];
                    $sp          = (int)$_POST['sp'];
                    $rj          = (int)$_POST['rj'];
                    $mg          = (int)$_POST['mg'];
                    $dtInicio    = $_POST['dt-ini-publi'];
                    $dtFim       = $_POST['dt-fim-publi'];

            if (empty($_FILES['img-publi']['tmp_name']) || $_FILES['img-publi']['error'] !== UPLOAD_ERR_OK) {
                die('Imagem obrigatória!');
            }

            $mime = mime_content_type($_FILES['img-publi']['tmp_name']);
            $ext  = $mime === 'image/png' ? '.png' : '.jpg';
            $nome = uniqid('publicidade_') . $ext;

            $dirUploads = __DIR__ . '/../../uploads/';
            if (!is_dir($dirUploads)) mkdir($dirUploads, 0775, true);

            $Imgsis  = $dirUploads . $nome; 
            $Img = $nome;  

            if (!move_uploaded_file($_FILES['img-publi']['tmp_name'], $Imgsis)) {
                die('Falha ao mover a imagem.');
            }

            $sql = 'INSERT INTO public.publicidades
                (titulo, descricao, imagem, titulo_botao_link, botao_link, sp_estado, mg_estado, rj_estado, dt_inicio, dt_fim)
                VALUES
                (:titulo, :descricao, :imagem, :titulo_botao, :botao_link, :sp, :mg, :rj, :dt_inicio, :dt_fim)';
                

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':titulo'       => $titulo,
                    ':descricao'    => $descricao,
                    ':imagem'       => $Img,
                    ':titulo_botao' => $tituloBotao,
                    ':botao_link'   => $linkBotao,
                    ':sp'    => $sp,
                    ':mg'    => $mg,
                    ':rj'    => $rj,
                    ':dt_inicio'    => $dtInicio,
                    ':dt_fim'       => $dtFim
                ]);
            
                exit;
            }
?>