<div class="nova-publicidade" id="overlayNovaPubli">
    <!-- voltar o display none depois -->
    <form method="POST">
        <div class="titulo-form">
            <h3> Nova publicidade</h3>
            <span class="material-symbols-outlined" style="margin-right: 15px;">close</span>
        </div>

        <label>Estado contemplados*</label>
        <input type="text">

        <label>Titulo*</label>
        <input type="text">

        <label>Descrição*</label>
        <input type="text">

        <label>Titulo do Botão*</label>
        <input type="text">

        <label>Link do Botão*</label>
        <input type="text">

        <label>Data de Publicação*</label>
        <input type="date">

        <label>Data Final da Publicação*</label>
        <input type="date">
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
        height: 90%;
        border-radius: 10px;
    }

    h3{
        padding: 12px 12px
    }

    .titulo-form{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<script>
    document.querySelector('.titulo-form span').addEventListener('click', function () {
    document.querySelector('.nova-publicidade').style.display = 'none';
  });
</script>