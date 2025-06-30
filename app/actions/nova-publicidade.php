<div class="nova-publicidade" id="overlayNovaPubli" style="display: none;">
    <form method="POST" action="">
        <div class="titulo-form">
            <h3> Nova publicidade</h3>
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
            <label style="margin-left: 20px;">IMAGEM DA PUBLICIDADE
                <input type="file" name="img-publi" class="img-publicidade">
            </label>
        </div>

        <div class="form-buttons">
            <button id="cancelar" style="border:1px solid rgb(73, 73, 73); color: rgb(73, 73, 73);"><span class="material-symbols-outlined" style="margin-right: 12px;">close</span>Cancelar</button>
            <button type="submit" name="confirmar" style="background-color: rgb(65, 91, 235); color: white;"><span class="material-symbols-outlined" style="margin-right: 12px;">check</span>Confirmar</button>
        </div>
                <?php
                if(isset($_POST['confirmar'])){
                    $titulo = $_POST['titulo'];
                    $descricao = $_POST['descricao'];
                    $tituloBotao = $_POST['tit-botao'];
                    $linkBotao = $_POST['link-botao'];
                    $dtInicio = '06-30-2025';
                    $dtFim = '07-30-2025';

                    $insert = "insert into publicidades(titulo, descricao, titulo_botao_link, botao_link, dt_inicio, dt_fim) 
                    values ('$titulo', '$descricao', '$tituloBotao', '$linkBotao', '$dtInicio', '$dtFim')";

                    $pdo->exec($insert); 

                    header('location:index.php');
                    exit();
                }
        ?>
    </form>

</div>

<style>
    .nova-publicidade{
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
    const overlay   = document.getElementById('overlayNovaPubli');  
    const btnCloseX = document.querySelector('.titulo-form span');   
    const btnCancel = document.getElementById('cancelar');        

    function fecharOverlay() {
      overlay.style.display = 'none';
    }

    btnCloseX.addEventListener('click', fecharOverlay);
    btnCancel.addEventListener('click', fecharOverlay);
  });
</script>