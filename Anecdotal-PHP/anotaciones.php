<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Faltas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
 .wrap-contact100 {
	background: #002973;
	color:white;
 }
 </style>
</head>
<body onLoad="cargar()">
<div class="container-contact100">
    <div class="wrap-contact100">
        <div class="row">
        	<div class="col-20" align="center">
        		<div class="sidebar-brand-text"><h1>Administrar Faltas</h1></div>
            <div>
        </div>
        <div class="row" style="background-color:#FFF">
        	<div class="col-10" align="center">
                <div id="anotaciones_l"></div>
            </div>
            <div class="col-11">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#2196f3' align='center'>
                    <td><b><font color='#FFFFFF'>Agregar Nueva Falta</font></b></td>
                    </tr>
                    <tr bgcolor='#2196f3'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4' aling="right">
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <b>Código Falta: </b> <br>
                            <input type='text' id='Codigo_Anotaciones' value='' placeholder='Ingrese Código'><br>
                            <b>Tipo Falta: </b> <br>
							<input type='text' id='Tipo_Anotaciones' value='' placeholder='Ingrese Tipo'><br>
							<b>Nombre Falta: </b> <br>
							<input type='text' id='Nombre_Anotaciones' value='' placeholder='Ingrese Nombre'><br>
							<b>Descripcion Falta: </b> <br>
							<input type='text' id='Descripcion_Anotaciones' value='' placeholder='Ingrese Descripcion'><br>
							<b>Descargos: </b> <br>
							<input type='text' id='Descargos_Anotaciones' value='' placeholder='Ingrese Descargos'><br>
							<b>Fecha: </b> <br>
							<input type='date' id='Fecha_Anotaciones' value='' placeholder='Ingrese Fecha'><br>
							<b>Novedades: </b> <br>
							<input type='text' id='Novedades_Anotaciones' value='' placeholder='Ingresa Novedad'><br>
							
                        </td>
                        </tr>
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_F' onClick='Agregar_F()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="anotaciones_2"></div>
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
			url: "./config/funciones5.php",
			data: parametros,
			success: function(a) {
				$('#anotaciones_l').html(a);
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
			url: "./config/funciones5.php",
			data: parametros,
			success: function(a) {
				$('#anotaciones_2').html(a);
			}
		});
		}
function Agregar_F(){
		var parametros = {
			"CODIGO_F": $("#Codigo_Anotaciones").val(),
			"TIPO_F": $("#Tipo_Anotaciones").val(),
			"NOMBRE_F": $("#Nombre_Anotaciones").val(),
			"DESCRIPCION_F": $("#Descripcion_Anotaciones").val(),
			"DESCARGOS_F": $("#Descargos_Anotaciones").val(),
			"FECHA_F": $("#Fecha_Anotaciones").val(),
			"NOVEDADES_F": $("#Novedades_Anotaciones").val(),
			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones5.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Codigo_Anotaciones").val('');
				$("#Tipo_Anotaciones").val('');
				$("#Nombre_Anotaciones").val('');
				$("#Descripcion_Anotaciones").val('');
				$("#Descargos_Anotaciones").val('');
				$("#Fecha_Anotaciones").val('');
				$("#Novedades_Anotaciones").val('');
				
			}
		});
		}
function Modificar_F(codigo){
		var parametros = {
			"CODIGO": codigo,
			"CODIGO_F": $("#CODIGO_F").val(),
			"TIPO_F": $("#TIPO_F").val(),
			"NOMBRE_F": $("#NOMBRE_F").val(),
			"DESCRIPCION_F": $("#DESCRIPCION_F").val(),
			"DESCARGOS_F": $("#DESCARGOS_F").val(),
			"FECHA_F": $("#FECHA_F").val(),
			"NOVEDADES_F": $("#NOVEDADES_F").val(),
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones5.php",
			data: parametros,
			success: function(a) {
				$('#anotaciones_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_F(codigo){
		var parametros = {
			"CODIGO": codigo,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones5.php",
			data: parametros,
			success: function(a) {
				$('#anotaciones_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>