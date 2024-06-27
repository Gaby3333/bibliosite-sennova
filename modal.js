const abrirModal = document.querySelector('.log_in');
const modal = document.querySelector('.modal');
const cerrarModal = document.querySelector('.boton_cerrar');

abrirModal.addEventListener('click', (e)=>{
	e.preventDefault();
	modal.classList.add('mostrar--modal');
})

cerrarModal.addEventListener('click', (e)=>{
	e.preventDefault();
	modal.classList.remove('mostrar--modal');
})