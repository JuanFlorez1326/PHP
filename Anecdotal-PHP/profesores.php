<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profesores</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!-- Custom styles for this template-->
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
        	<div class="col-12" align="center">
        		<div class="sidebar-brand-text"><h1>Administración de Profesores</h1></div>
            <div>
        </div>
        <div class="row" style="background-color:#FFF">
        	<div class="col-6" align="center">
                <div id="profesores_l"></div>
            </div>
            <div class="col-5">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#2196f3' align='center'>
                    <td><b><font color='#FFFFFF'>Agregar Nuevo Profesor</font></b></td>
                    </tr>
                    <tr bgcolor='#2196f3'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4'>
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <b>Cedula de Profesor: </b> <br>
                            <input type='text' id='Cedula' value='' placeholder='Ingrese Cedula'><br>
                            <b>Nombre del Profesor: </b> <br>
							<input type='text' id='Nombres' value='' placeholder='Ingrese Nombres'><br>
							<b>Apellidos del Profesor: </b> <br>
							<input type='text' id='Apellidos' value='' placeholder='Ingrese Apellidos'><br>
							<b>Telefono del Profesor: </b> <br>
							<input type='text' id='Telefono' value='' placeholder='Ingrese Telefono'><br>
							<b>E_mail del Profesor: </b> <br>
							<input type='text' id='E_mail' value='' placeholder='Ingrese E_mail'><br>
                        </td>
                        </tr>
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_P' onClick='Agregar_P()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="profesores_2"></div>
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
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#profesores_l').html(a);
			}
		});
}
function Administrar(cedula){
		var parametros = {
			"CEDULA": cedula,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#profesores_2').html(a);
			}
		});
		}
function Agregar_P(){
		var parametros = {
			"CEDULA_P": $("#Cedula").val(),
			"NOMBRES_P": $("#Nombres").val(),
			"APELLIDOS_P": $("#Apellidos").val(),
			"TELEFONO_P": $("#Telefono").val(),
			"E_MAIL_P": $("#E_mail").val(),
			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Cedula").val('');
				$("#Nombres").val('');
				$("#Apellidos").val('');
				$("#Telefono").val('');
				$("#E_mail").val('');

			}
		});
		}
function Modificar_P(cedula){
		var parametros = {
			"CEDULA": cedula,
			"CEDULA_P": $("#CEDULA_P").val(),
			"NOMBRES_P": $("#NOMBRES_P").val(),
			"APELLIDOS_P": $("#APELLIDOS_P").val(),
			"TELEFONO_P": $("#TELEFONO_P").val(),
			"E_MAIL_P": $("#E_MAIL_P").val(),
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#profesores_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_P(cedula){
		var parametros = {
			"CEDULA": cedula,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#profesores_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>