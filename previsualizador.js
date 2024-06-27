const iconoFile = 'RECURSOS/imagen.svg';
const file=document.getElementById('ingreso_logo_semillero');
const imagen=document.getElementById('visualizar_imagen');

file.addEventListener('change', e => {

	if (e.target.files[0]) {
		const reader = new FileReader();

		reader.onload = function(e){

			imagen.src = e.target.result;
		}
		reader.readAsDataURL(e.target.files[0])
	}else {
		imagen.src = iconoFile;
	}

});