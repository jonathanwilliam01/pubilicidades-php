<div class="editar-publicidade" id="overlayEditPubli" style="display: none;">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="titulo-form">
            <h3> Editar publicidade</h3>
            <span class="material-symbols-outlined" style="margin-right: 15px;">close</span>
        </div>

        <div class="form-campos1">
            <label>Estado contemplados*
                <input type="text" name="estados">
            </label>

            <label>Titulo*
                <input type="text" name="titulo">
            </label>

            <label>Descrição*
                <input type="text" name="descricao">
            </label>
        </div>

        <div class="form-campos2">
            <label>Titulo do Botão*
                <input type="text" name="tit-botao">
            </label>

            <label>Link do Botão*
                <input type="text" name="link-botao">
            </label>

            <label>Data de Publicação*
                <input type="date" name="dt-ini-publi">
            </label>

            <label>Data Final da Publicação*
                <input type="date" name="dt-fim-publi">
            </label>
        </div>

        <div class="form-img">
            <label style="margin-left: 20px;">IMAGEM DA PUBLICIDADE*
                <input type="file" name="img-publi" id="img-publi" class="img-publicidade" accept="image/*" required>
                <img id="preview-img" style="display:none; margin-top:8px; width:100px; height:100px; border-radius:6px;">
            </label>
</div>

        <div class="form-buttons">
            <button id="cancelar" style="border:1px solid rgb(73, 73, 73); color: rgb(73, 73, 73);"><span class="material-symbols-outlined" style="margin-right: 12px;">close</span>Cancelar</button>
            <input type="submit" class="confirm" name="confirmar" value = "Confirmar" style="background-color: rgb(65, 91, 235); color: white;">
            <?php
                if (isset($_POST['confirmar'])) {
                    $titulo      = $_POST['titulo'];
                    $descricao   = $_POST['descricao'];
                    $tituloBotao = $_POST['tit-botao'];
                    $linkBotao   = $_POST['link-botao'];
                    $dtInicio    = $_POST['dt-ini-publi'];
                    $dtFim       = $_POST['dt-fim-publi'];

            if (empty($_FILES['img-publi']['tmp_name']) || $_FILES['img-publi']['error'] !== UPLOAD_ERR_OK) {
                die('Imagem obrigatória!');
            }

            $mime = mime_content_type($_FILES['img-publi']['tmp_name']);
            $ext  = $mime === 'image/png' ? '.png' : '.jpg';
            $nome = uniqid('publicidade_') . $ext;

            $dirUploads = __DIR__ . '/../uploads/';
            if (!is_dir($dirUploads)) mkdir($dirUploads, 0775, true);

            $pathFs  = $dirUploads . $nome; 
            $pathWeb = $nome;  

            if (!move_uploaded_file($_FILES['img-publi']['tmp_name'], $pathFs)) {
                die('Falha ao mover a imagem.');
            }

            $sql = 'INSERT INTO public.publicidades
                (titulo, descricao, imagem, titulo_botao_link, botao_link, dt_inicio, dt_fim)
                VALUES
                (:titulo, :descricao, :imagem, :titulo_botao, :botao_link, :dt_inicio, :dt_fim)';

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':titulo'       => $titulo,
                    ':descricao'    => $descricao,
                    ':imagem'       => $pathWeb,
                    ':titulo_botao' => $tituloBotao,
                    ':botao_link'   => $linkBotao,
                    ':dt_inicio'    => $dtInicio,
                    ':dt_fim'       => $dtFim
                ]);
            
                header('Location:../index.php'); 
                exit();
}
            ?>
        </div>
    </form>
</div>

<style>
    .editar-publicidade{
        width: 100vw;
        height: 100vh;
        background-color:rgba(39, 39, 39, 0.52);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999; 
        display: flex;   
        justify-content: center;
        align-items: center;
    }

    form{
        background-color: white;
        width: 40%;
        height: 95%;
        border-radius: 10px;
        font-size: 13px;
    }

    h3{
        padding: 12px 12px
    }

    .form-buttons{
        display:flex;            
        justify-content:flex-end;
        gap:12px;               
        padding:0 20px 20px; 
    }

    .confirm{
        padding:3px 12px;
        cursor:pointer;
        border-radius:4px;
        border: none;
        display: flex;
        align-items: center;
    }

    .form-buttons button{
        padding:3px 12px;
        cursor:pointer;
        border-radius:4px;
        border: none;
        display: flex;
        align-items: center;
    }

    .titulo-form{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-campos1{
        display:grid;
        grid-template-columns:1fr; 
        gap:14px;
        padding:0 20px 20px;
        margin-top: 10px;
   }

    .form-campos2{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:14px 18px;         
        padding:0 20px 20px;
    }

    form label{
        display:flex;
        flex-direction:column;
        font-weight:600;
        color:#444;
    }

    form input, .img-publicidade{
        margin-top:4px;
        padding:8px 10px;
        border:1px solid #ccc;
        border-radius:6px;
        font:inherit;
    }

    .form-img{
        height: 20%;
        width: 95%;
    }


</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    //ações de fechar a div
    const overlay   = document.getElementById('overlayNovaPubli');  
    const btnCloseX = document.querySelector('.titulo-form span');   
    const btnCancel = document.getElementById('cancelar');        

    function fecharOverlay() {
      overlay.style.display = 'none';
    }

    btnCloseX.addEventListener('click', fecharOverlay);
    btnCancel.addEventListener('click', fecharOverlay);

    const inputImg = document.getElementById('img-publi');
    const preview  = document.getElementById('preview-img');

    //faz preview da imagem
    inputImg.addEventListener('change', () => {
        const file = inputImg.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
         } else {
            preview.src = '';
            preview.style.display = 'none';
         }
    });

    //retorna o tamanho maximo da imagem
    const input = document.getElementById('img-publi');
        input.addEventListener('change', () => {
        const file = input.files[0];
    if (file && file.size > 2 * 1024 * 1024) {  
        alert('Imagem maior que 2MB. Escolha outra.');
        input.value = '';   
        }
    });
  });
</script>