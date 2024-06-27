let paginaActual = 1

getData(paginaActual)


document.getElementById("buscador").addEventListener("keyup",function(){
	getData(1)
}, false)
document.getElementById("num_registros").addEventListener("change", function(){
	getData(paginaActual)
}, false)


function getData(pagina){
	let input =document.getElementById("buscador").value
	let select =document.getElementById("num_registros").value
	let content =document.getElementById("registroProyectos")

	if (pagina != null)
	{
		paginaActual = pagina
	}



	let url = "cargar.php"
	let formaData = new FormData()
	formaData.append('buscador', input)
	formaData.append('num_registros', select)
	formaData.append('pagina', pagina)

		fetch(url,{
			method: "POST",
			body: formaData
		}).then(response => response.json())
		.then(data =>{
			content.innerHTML = data.data
			document.getElementById("pagina_num").innerHTML = 'Mostrando ' + data.paginacion + ' de ' + data.paginacion_total+ ' registros'
			document.getElementById("navegador_paginas").innerHTML = data.numero_paginacion
		}).catch(error => console.log('Up... Algo fallo'))
	}