<div class="toast-reativado" id="toast-reativado">
    <span class="material-symbols-outlined more-btn" style="font-size: 37px; margin-left: 10px;">check</span>
    <h5 style="margin-left: 10px;">Publicidade reativada com sucesso!</h5>
</div>

<style>
    .toast-reativado{
        width: 16vw;
        height: 6vh;
        margin-top: 15px;
        margin-left: 5px;
        background-color:rgb(128, 218, 105);
        border: 1px solid rgb(97, 180, 76);
        color: green;
        border-radius: 5px;
        position: fixed;
        top: 0;
        left: 0;
        opacity:0;
        transition:opacity .4s;
        z-index: 9999; 
        display: flex;   
        justify-content: left;
        align-items: center;       
    }
    .toast-reativado.show{ opacity:1; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const toast = document.getElementById('toast-reativado');
  if (!toast) return;

  /* mostra */
  requestAnimationFrame(()=> toast.classList.add('show'));

  /* esconde após 3 s */
  setTimeout(() => toast.classList.remove('show'), 2000);
});
</script>