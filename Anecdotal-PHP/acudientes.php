<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Acudientes</title>
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
        	<div class="col-12" align="center">
        		<div class="sidebar-brand-text"><h1>Administrar Acudientes</h1></div>
            <div>
        </div>
        <div class="row" style="background-color:#FFF">
        	<div class="col-6" align="center">
                <div id="acudientes_l"></div>
            </div>
            <div class="col-5">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#2196f3' align='center'>
                    <td><b><font color='#FFFFFF'>Agregar Nuevo Acudiente</font></b></td>
                    </tr>
                    <tr bgcolor='#2196f3'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4'>
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <b>Documento Acudiente: </b> <br>
                            <input type='text' id='Cedula' value='' placeholder='Ingrese Cedula'><br>
                            <b>Nombres  Acudiente: </b> <br>
							<input type='text' id='Nombres' value='' placeholder='Ingrese Nombres'><br>
							<b>Apellidos Acudiente: </b> <br>
							<input type='text' id='Apellidos' value='' placeholder='Ingrese Apellidos'><br>
							<b>Direccion Acudiente: </b> <br>
							<input type='text' id='Direccion' value='' placeholder='Ingrese Apellidos'><br>
							<b>Telefono Acudiente: </b> <br>
							<input type='text' id='Telefono' value='' placeholder='Ingrese Telefono'><br>
							<b>E_mail Acudiente: </b> <br>
							<input type='text' id='E_mail' value='' placeholder='Ingrese E_mail'><br>
                        </td>
                        </tr>
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_A' onClick='Agregar_A()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="acudientes_2"></div>
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
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#acudientes_l').html(a);
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
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#acudientes_2').html(a);
			}
		});
		}
function Agregar_A(){
		var parametros = {
			"CEDULA_A": $("#Cedula").val(),
			"NOMBRES_A": $("#Nombres").val(),
			"APELLIDOS_A": $("#Apellidos").val(),
			"DIRECCION_A": $("#Direccion").val(),
			"TELEFONO_A": $("#Telefono").val(),
			"E_MAIL_A": $("#E_mail").val(),
			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Cedula").val('');
				$("#Nombres").val('');
				$("#Apellidos").val('');
				$("#Direccion").val('');
				$("#Telefono").val('');
				$("#E_mail").val('');

			}
		});
		}
function Modificar_A(cedula){
		var parametros = {
			"CEDULA": cedula,
			"CEDULA_A": $("#CEDULA_A").val(),
			"NOMBRES_A": $("#NOMBRES_A").val(),
			"APELLIDOS_A": $("#APELLIDOS_A").val(),
			"DIRECCION_A": $("#DIRECCION_A").val(),
			"TELEFONO_A": $("#TELEFONO_A").val(),
			"E_MAIL_A": $("#E_MAIL_A").val(),
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#acudientes_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_A(cedula){
		var parametros = {
			"CEDULA": cedula,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#acudientes_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>