document.addEventListener('DOMContentLoaded', () => {
  const btnNova  = document.getElementById('btnNovaPubli');  
  const btnEdit  = document.getElementById('edit-publi');  
  const overlay  = document.getElementById('overlayNovaPubli'); 
  const overlayEdit  = document.getElementById('overlayEditPubli'); 

  if (!btnNova || !overlay) return;

  btnNova.addEventListener('click', e => {
    e.preventDefault();  
    overlay.style.display = 'flex';
  });

  btnEdit.addEventListener('click', e => {
    e.preventDefault();  
    overlayEdit.style.display = 'flex';
  });

  overlay.addEventListener('click', e => {
    if (e.target === overlay) overlay.style.display = 'none';
  });

  overlayEdit.addEventListener('click', e => {
    if (e.target === overlayEdit) overlayEdit.style.display = 'none';
  });
});
