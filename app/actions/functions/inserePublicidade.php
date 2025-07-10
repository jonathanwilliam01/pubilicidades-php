<?php
            if (isset($_POST['confirmar'])) {
                    $titulo      = $_POST['titulo'];
                    $descricao   = $_POST['descricao'];
                    $tituloBotao = $_POST['tit-botao'];
                    $linkBotao   = filter_var(trim($_POST['link-botao']), FILTER_SANITIZE_URL);
                    $sp = isset($_POST['sp']) && $_POST['sp'] == '1' ? 1 : 0;
                    $rj = isset($_POST['rj']) && $_POST['rj'] == '1' ? 1 : 0;
                    $mg = isset($_POST['mg']) && $_POST['mg'] == '1' ? 1 : 0;
                    $dtInicio    = $_POST['dt-ini-publi'];
                    $dtFim       = $_POST['dt-fim-publi'];
                    $padrao      = isset($_POST['padrao']) && $_POST['padrao'] == '1' ? 1 : 0;

                if ($padrao === 1) {
                $errosPadrao = [];

                if ($sp === 1) {
                    $sql = "SELECT 1 FROM publicidades WHERE sp_estado = 1 AND padrao = 1";
                    $stmt = $pdo->query($sql);
                    if ($stmt->fetch()) $errosPadrao[] = 'São Paulo';
                }

                if ($rj === 1) {
                    $sql = "SELECT 1 FROM publicidades WHERE rj_estado = 1 AND padrao = 1";
                    $stmt = $pdo->query($sql);
                    if ($stmt->fetch()) $errosPadrao[] = 'Rio de Janeiro';
                }

                if ($mg === 1) {
                    $sql = "SELECT 1 FROM publicidades WHERE mg_estado = 1 AND padrao = 1";
                    $stmt = $pdo->query($sql);
                    if ($stmt->fetch()) $errosPadrao[] = 'Minas Gerais';
                }

                if (!empty($errosPadrao)) {
                    $estadosComPadrao = implode(', ', $errosPadrao);
                    echo "<script>alert('⚠️ Já existe publicidade padrão para os seguintes estados: {$estadosComPadrao}');
                    window.location.href = 'http://localhost:8080/index.php';
                    </script>";
                    exit;
                }
                }


            if (!strtotime($dtInicio) || !strtotime($dtFim)) {
                die('Datas inválidas!');
            }
            
            //BLOCO DE UPLOAD DE IMAGEM
            if (empty($_FILES['img-publi']['tmp_name']) || $_FILES['img-publi']['error'] !== UPLOAD_ERR_OK) {
                die('Imagem obrigatória!');
            }

            $mime = mime_content_type($_FILES['img-publi']['tmp_name']);
            $ext = match ($mime) {
                'image/png' => '.png',
                'image/jpeg', 'image/jpg' => '.jpg',
                 default => die('Formato de imagem não suportado.'),
            };
            $nome = uniqid('publicidade_') . $ext;

            $dirUploads = __DIR__ . '/../../uploads/';
            if (!is_dir($dirUploads)) mkdir($dirUploads, 0775, true);

            $Imgsis  = $dirUploads . $nome; 
            $Img = $nome;  

            if (!move_uploaded_file($_FILES['img-publi']['tmp_name'], $Imgsis)) {
                die('Falha ao mover a imagem.');
            }
            //FIM DO BLOCO DE UPLOAD DE IMAGEM

            $sql = 'INSERT INTO public.publicidades
                (titulo, descricao, imagem, titulo_botao_link, botao_link, sp_estado, mg_estado, rj_estado, dt_inicio, dt_fim, padrao)
                VALUES
                (:titulo, :descricao, :imagem, :titulo_botao, :botao_link, :sp, :mg, :rj, :dt_inicio, :dt_fim, :padrao)';
                

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
                    ':dt_fim'       => $dtFim,
                    ':padrao'       => $padrao
                ]);
                    header('location: index.php');
                exit;
            }
?>