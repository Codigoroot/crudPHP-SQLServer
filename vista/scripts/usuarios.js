var tabla;


$(document).ready(function(){
	tabla = $('#tabla').dataTable({
		"aProcessing" : true,
		"aServerSide" : true,
		dom:'Bfrtip',
		"ajax":{
			url: '../controlador/controlador_usuarios.php?opcion=listarUsuarios',
			method: 'GET',
			dataType: 'json',
			error: function(jqXHR, textStatus, errorThrown){
				console.log("Error en la petición Ajax: " + textStatus + " - " + errorThrown);
				console.log(jqXHR.resposeText);
			}
		},
		"bDestroy": true,
		"iDisplaylength" : 5,
		"order": [[0, "desc"]]
	}).DataTable();

});

$('#agregarUsuario').click(function(){
	limpiarInputs();
});



function mostrarUsuario(Id){
	$('#myModal').modal('show');
	$.post("../controlador/controlador_usuarios.php?opcion=mostrarUsuario",{Id : Id},function(data, status)
	{
		var respuesta = JSON.parse(data);

		limpiarInputs();
		$('#Id').val(respuesta.Id)
		$('#Nombre').val(respuesta.Nombre);
		$('#Edad').val(respuesta.Edad);
		$('#Correo').val(respuesta.Correo);
		$('#Nacionalidad').val(respuesta.Nacionalidad);
	})
}


function guardar_editar(){

	var datos_formulario = new FormData($('#formulario')[0]);

	$.ajax({
		url: "../controlador/controlador_usuarios.php?opcion=guardar_editarUsuario",
		type: "POST",
		data: datos_formulario,
		contentType: false,
		processData: false,
		success: function(data, status){
			console.log(data)
			if (data == "si") {
				Swal.fire({
					icon: 'success',
					title: 'Genial',
					text: 'Operación Exitosa',
				})
				$('#myModal').modal('hide');
				tabla.ajax.reload();
			}else{
				$('#myModal').modal('hide');
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Algo salio mal',
				})
			}
		}       
	});
}


function eliminarUsuario(Id){

	Swal.fire({
		title: '¿Quiere eliminar el registro?',
		text: 'Esta opción no se puede revertir',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminar!'
	}).then((result)=>{
		if (result.isConfirmed) {
			$.post("../controlador/controlador_usuarios.php?opcion=eliminarUsuario", {Id : Id}, function(data,status){
				if (data == "si") {
					Swal.fire({
						icon: 'success',
						title: 'Genial',
						text: 'El registro se elimino correctamente',
					})
					tabla.ajax.reload();
				}else{
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'No se pudo eliminar el registro',
					})
				}
			})
		}
	})
}


function limpiarInputs(){
	$('#Id').val("");
	$('#Nombre').val("");
	$('#Edad').val("");
	$('#Correo').val("");
	$('#Nacionalidad').val("");
}
