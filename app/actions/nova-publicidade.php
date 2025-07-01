<?php
include_once 'functions/inserePublicidade.php';
?>

<script src="functions/js-functions.js"></script>

<div class="nova-publicidade" id="overlayNovaPubli" style="display:none">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="titulo-form">
            <h3> Nova publicidade</h3>
            <span class="material-symbols-outlined" id="close" style="margin-right: 15px;">close</span>
        </div>

        <div class="form-campos1">
                <label>Estado contemplados*
                  <div class="estados">
                    <label> São Paulo
                        <input type="hidden" name="sp" value="0">
                        <input type="checkbox" name="sp" value="1" >
                    </label>
                    <label> Rio de Janeiro
                        <input type="hidden" name="rj" value="0">
                        <input type="checkbox" name="rj" value="1">
                    </label>
                    <label> Minas Gerais
                        <input type="hidden" name="mg" value="0">
                        <input type="checkbox" name="mg" value="1">
                    </label>
                  </div>
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
            <button type="submit" class="confirm" name="confirmar" value = "Confirmar" style="background-color: rgb(65, 91, 235); color: white;"><span class="material-symbols-outlined" style="margin-right: 12px;">check</span>Confirmar</button>
        </div>
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

    .estados{
        display: flex;
        align-items: center;
        gap: 12px;
    }

     .estados label{
        display: inline-block;
        align-items: center;
        gap: 4px;
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