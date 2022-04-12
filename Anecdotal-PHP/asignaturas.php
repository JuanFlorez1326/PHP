<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Asignaturas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
 	<link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
 	.wrap-contact100 {
		background:#002973;
		color:white;
 	}
 </style>
</head>
<body onLoad="cargar()">
<div class="container-contact100">
    <div class="wrap-contact100">
        <div class="row">
        	<div class="col-12" align="center">
        		<div class="sidebar-brand-text"><h1>Administración de Asignaturas Académicas</h1></div>
            <div>
        </div>
        <div class="row" style="background-color:#FFF">
        	<div class="col-6" align="center">
                <div id="asignaturas_l"></div>
            </div>
            <div class="col-5">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#2196f3' align='center'>
                    <td><b><font color='#FFFFFF'>Agregar Nueva Asignatura</font></b></td>
                    </tr>
                    <tr bgcolor='#2196f3'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4'>
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <b>Código de Asignatura: </b> <br>
                            <input type='text' id='Codigo' value='' placeholder='Ingrese Código'><br>
                            <b>Nombre de Asignatura: </b> <br>
                            <input type='text' id='Nombre' value='' placeholder='Ingrese Nombre'><br>
                        </td>
                        </tr>
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_M' onClick='Agregar_M()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="asignaturas_2"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type='text/javascript'>
function cargar(){
	var parametros = {
			"TIPO":"LISTAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#asignaturas_l').html(a);
			}
		});
}
function Administrar(codigo){
		var parametros = {
			"CODIGO": codigo,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#asignaturas_2').html(a);
			}
		});
		}
function Agregar_M(){
		var parametros = {
			"CODIGO_M": $("#Codigo").val(),
			"NOMBRE_M": $("#Nombre").val(),
			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Codigo").val('');
				$("#Nombre").val('');
			}
		});
		}
function Modificar_M(codigo){
		var parametros = {
			"CODIGO": codigo,
			"CODIGO_M": $("#CODIGO_M").val(),
			"NOMBRE_M": $("#NOMBRE_M").val(),
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#asignaturas_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_M(codigo){
		var parametros = {
			"CODIGO": codigo,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#asignaturas_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>