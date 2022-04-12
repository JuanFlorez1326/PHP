<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Estudiantes</title>
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
        	<div class="col-20" align="center">
        		<div class="sidebar-brand-text"><h1>Administrar Estudiantes</h1></div>
            <div>
        </div>
        <div class="row" style="background-color:#FFF">
        	<div class="col-10" align="center">
                <div id="estudiantes_l"></div>
            </div>
            <div class="col-11">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#2196f3' align='center'>
                    <td><b><font color='#FFFFFF'>Agregar Nuevo Estudiante</font></b></td>
                    </tr>
                    <tr bgcolor='#2196f3'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4' aling="right">
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <b>Código del Estudiante: </b> <br>
                            <input type='text' id='Codigo_Estudiante' value='' placeholder='Ingrese Código'><br>
                            <b>Nombres Estudiante: </b> <br>
							<input type='text' id='Nombres_Estudiante' value='' placeholder='Ingrese Nombres'><br>
							<b>Apellidos Estudiante: </b> <br>
							<input type='text' id='Apellidos_Estudiante' value='' placeholder='Ingrese Apellidos'><br>
							<b>Fecha de Nacimiento: </b> <br>
							<input type='date' id='Fecha_Nacimiento' value='' placeholder='Ingrese Fecha'><br>
							<b>Tipo_Sangre: </b> <br>
							<input type='text' id='Tipo_Sangre' value='' placeholder='Tipo Sangre'><br>
							<b>Eps Estudiante: </b> <br>
							<input type='text' id='Eps_Estudiante' value='' placeholder='Ingrese Eps'><br>
							<b>Grado: </b> <br>
							<input type='text' id='Grado_Estudiante' value='' placeholder='Grado Estudiante'><br>
							<b>Direccion Estudiante: </b> <br>
							<input type='text' id='Direccion_Estudiante' value='' placeholder='Ingrese Direccion'><br>
							<b>Telefono Estudiante: </b> <br>
							<input type='text' id='Telefono_Estudiante' value='' placeholder='Ingrese Telefono'><br>
                            <b>E_mail Estudiante: </b> <br>
							<input type='text' id='E_mail_Estudiante' value='' placeholder='Ingrese E_mail'><br>
                        </td>
                        </tr>
                        <tr bgcolor='#FFFFFF'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_E' onClick='Agregar_E()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="estudiantes_2"></div>
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
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#estudiantes_l').html(a);
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
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#estudiantes_2').html(a);
			}
		});
		}
function Agregar_E(){
		var parametros = {
			"CODIGO_E": $("#Codigo_Estudiante").val(),
			"NOMBRES_E": $("#Nombres_Estudiante").val(),
			"APELLIDOS_E": $("#Apellidos_Estudiante").val(),
			"FECHA_E": $("#Fecha_Nacimiento").val(),
			"TIPOS_E": $("#Tipo_Sangre").val(),
			"EPS_E": $("#Eps_Estudiante").val(),
			"GRADO_E": $("#Grado_Estudiante").val(),
			"DIRECCION_E": $("#Direccion_Estudiante").val(),
			"TELEFONO_E": $("#Telefono_Estudiante").val(),
			"EMAIL_E": $("#E_mail_Estudiante").val(),
			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Codigo_Estudiante").val('');
				$("#Nombres_Estudiante").val('');
				$("#Apellidos_Estudiantes").val('');
				$("#Fecha_Nacimiento").val('');
				$("#Tipo_Sangre").val('');
				$("#Eps_Estudiante").val('');
				$("#Grado_Estudiante").val('');
				$("#Direccion_Eatudiante").val('');
				$("#Telefono_Estudiante").val('');
				$("#E_mail_Estudiante").val('');
			}
		});
		}
function Modificar_E(codigo){
		var parametros = {
			"CODIGO": codigo,
			"CODIGO_E": $("#CODIGO_E").val(),
			"NOMBRES_E": $("#NOMBRES_E").val(),
			"APELLIDOS_E": $("#APELLIDOS_E").val(),
			"FECHA_E": $("#FECHA_E").val(),
			"TIPOS_E": $("#TIPOS_E").val(),
			"EPS_E": $("#EPS_E").val(),
			"GRADO_E": $("#GRADO_E").val(),
			"DIRECCION_E": $("#DIRECCION_E").val(),
			"TELEFONO_E": $("#TELEFONO_E").val(),
			"EMAIL_E": $("#EMAIL_E").val(),
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#estudiantes_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_E(codigo){
		var parametros = {
			"CODIGO": codigo,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#estudiantes_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>