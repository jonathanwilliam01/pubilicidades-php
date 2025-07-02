  document.addEventListener('DOMContentLoaded', () => {

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

    //retorna alerta do tamanho maximo da imagem
    const input = document.getElementById('img-publi');
        input.addEventListener('change', () => {
        const file = input.files[0];
    if (file && file.size > 2 * 1024 * 1024) {  
        alert('Imagem maior que 2MB. Escolha outra.');
        input.value = '';   
        }
    });
  });