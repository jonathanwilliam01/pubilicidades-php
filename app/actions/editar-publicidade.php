<div class="editar-publicidade" id="overlayEditPubli" style="display: none;">
    <form method="POST">
        <div class="titulo-form">
            <h3> Editar publicidade</h3>
            <span class="material-symbols-outlined" style="margin-right: 15px;">close</span>
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
    document.querySelector('.editar-publicidade').style.display = 'none';
  });
</script>