<?php
include_once 'functions/insereEstado.php';
?>

<div class="novo-estado" id="overlayNovoEst" style="display:none">
    <form method="POST" action="" class="formEst">
        <div class="titulo-form">
            <h3> Novo Estado</h3>
            <span class="material-symbols-outlined" id="close" onclick="location.href='../../index.php';" style="margin-right: 15px;">close</span>
        </div>

        <div class="form-campos1">
            <label>Descrição do Estado*
                <input type="text" name="descricao" required>
            </label>

            <label>UF*
                <input type="text" name="uf" required>
            </label>
        </div>

        <div class="form-buttons">
            <button type="button" id="cancelar" onclick="location.href='../../index.php';" style="border:1px solid rgb(73, 73, 73); color: rgb(73, 73, 73);"><span class="material-symbols-outlined" style="margin-right: 12px;">close</span>Cancelar</button>
            <button type="submit" class="confirm" name="confirmarEst" value = "confirmarEst" style="background-color: rgb(65, 91, 235); color: white;"><span class="material-symbols-outlined" style="margin-right: 12px;">check</span>Confirmar</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btnNovo  = document.getElementById('btnNovo'); 
    const overlayNovo  = document.getElementById('overlayNovoEst'); 

    btnNovo.addEventListener('click', e => {
        e.preventDefault();  
        overlayNovo.style.display = 'flex';
    });

    overlayNovo.addEventListener('click', e => {
        if (e.target === overlayNovo) overlayNovo.style.display = 'none';
    });
});
</script>

<style>
    .novo-estado{
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

    .formEst{
        background-color: white;
        width: 40%;
        height: 40%;
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
    //ações de fechar a div
    const overlay   = document.getElementById('overlayNovoEst');      

    function fecharOverlay() {
      overlay.style.display = 'none';
      location.reload();
    }
</script>