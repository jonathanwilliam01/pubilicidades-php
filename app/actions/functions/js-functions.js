  document.addEventListener('DOMContentLoaded', () => {
    //ações de fechar a div
    const overlay   = document.getElementById('overlayNovaPubli'); 
    const overlayedit = document.getElementById('overlayEditPubli');  
    const btnCloseX = document.querySelector('.titulo-form span');   
    const btnCancel = document.getElementById('cancelar');        

    function fecharOverlay() {
      overlay.style.display = 'none';
    }

    function fecharOverlayEdit() {
      overlayedit.style.display = 'none';
    }

    btnCloseX.addEventListener('click', fecharOverlay);
    btnCancel.addEventListener('click', fecharOverlay);

    btnCloseX.addEventListener('click', fecharOverlayEdit);
    btnCancel.addEventListener('click', fecharOverlayEdit);

    //faz preview da imagem
    const inputImg = document.getElementById('img-publi');
    const preview  = document.getElementById('preview-img');

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
