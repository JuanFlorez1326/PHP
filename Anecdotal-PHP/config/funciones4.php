<?php
include("database.php");
if ($_POST['TIPO']=="LISTAR"){
	$sql = "SELECT Idestudiantes,Codigo,Nombres,Apellidos,Fecha_Nacimiento,Tipo_Sangre,Eps,Grado,Direccion,Telefono,E_mail from estudiantes order by Idestudiantes"; 
    $tabla="<div class='box-body'><table id='detalle1' class='table table-bordered table-striped table-condensed'>
                 <thead>
                        <tr>
                          <th>Código</th>
						  <th>Nombres</th>
						  <th>Apellidos</th>
						  <th>Fecha Nacimiento</th>
						  <th>Tipo Sangre</th>
						  <th>Eps</th>
						  <th>Grado</th>
						  <th>Direccion</th>
						  <th>Telefono</th>
						  <th>Email</th>
                          <th></th>
                        </tr>
                 </thead>
                 <tbody>";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        $datos="";
	if ($count>0) { 
		while($row = mysqli_fetch_row($result)){
                $datos=$datos."<tr>
                    <td>".$row[1]."</td>
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
					<td>".$row[4]."</td>
					<td>".$row[5]."</td>
					<td>".$row[6]."</td>
					<td>".$row[7]."</td>
					<td>".$row[8]."</td>
					<td>".$row[9]."</td>
		    		<td>".$row[10]."</td>
                    <td>
                       <button type='submit' name='ADMINISTRAR' onClick='Administrar(".$row[0].")'>Administrar</button>
                     </td>
                    </tr>";
            }
            $tabla=$tabla.$datos;
            echo $tabla."</tbody></table> <br> <b>Total de Registros: </b>".$count;
			mysqli_close($con);	
	}else{
		echo "<b>No existen registro de estudiantes creados.</b>";
		}
}//FIN FUNCION LISTAR ESTUDIANTES

if ($_POST['TIPO']=="NUEVO"){
	$sql = "insert into estudiantes(Codigo,Nombres,Apellidos,Fecha_Nacimiento,Tipo_Sangre,Eps,Grado,Direccion,Telefono,E_mail) values('".$_POST['CODIGO_E']."','".$_POST['NOMBRES_E']."' ,'".$_POST['APELLIDOS_E']."','".$_POST['FECHA_E']."', '".$_POST['TIPOS_E']."', '".$_POST['EPS_E']."', '".$_POST['GRADO_E']."', '".$_POST['DIRECCION_E']."', '".$_POST['TELEFONO_E']."', '".$_POST['EMAIL_E']."')";
	mysqli_query($con, $sql);
	mysqli_close($con);		
}//FIN FUNCION NUEVOS ESTUDIANTES

if ($_POST['TIPO']=="CARGAR"){ 
$codigo = $_POST['CODIGO'];
$sql = "select Idestudiantes,Codigo,Nombres,apellidos,Fecha_Nacimiento,Tipo_Sangre,Eps,Grado,Direccion,Telefono,E_mail from estudiantes where Idestudiantes=".$codigo;
$result=mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($count>0) {
	echo"
		<table width='' border='0' cellspacing='0' cellpadding='1'>
		<tr bgcolor='#2196f3' align='center'>
		<td><b><font color='#FFFFFF'>Registro a Modificar</font></b></td>
		</tr>
		<tr bgcolor='#2196f3'>
		<td>
		<table width='100%' border='0' cellspacing='0' cellpadding='4'>
	";
	while($row = mysqli_fetch_row($result)){
		echo"
			<tr bgcolor='#FFFFFF'>
			<td>
				<b>Código: </b> <br>
				<input type='text' id='CODIGO_E' value='".$row[1]."'><br>
				<b>Nombres: </b> <br>
				<input type='text' id='NOMBRES_E' value='".$row[2]."'><br>
				<b>Apellidos: </b> <br>
				<input type='text' id='APELLIDOS_E' value='".$row[3]."'><br>
				<b>Fecha: </b> <br>
				<input type='date' id='FECHA_E' value='".$row[4]."'><br>
				<b>Tipo de Sangre: </b> <br>
				<input type='text' id='TIPOS_E' value='".$row[5]."'><br>
				<b>Eps: </b> <br>
				<input type='text' id='EPS_E' value='".$row[6]."'><br>
				<b>Grado: </b> <br>
				<input type='text' id='GRADO_E' value='".$row[7]."'><br>
				<b>Direccion: </b> <br>
				<input type='text' id='DIRECCION_E' value='".$row[8]."'><br>
				<b>Telefono: </b> <br>
				<input type='text' id='TELEFONO_E' value='".$row[9]."'><br>
				<b>Email: </b> <br>
				<input type='text' id='EMAIL_E' value='".$row[10]."'><br>
			</td>
			</tr>
			<tr bgcolor='#FFFFFF'>
			<td>
				<button type='submit' class='alert-primary' name='MODIFICAR_E' onClick='Modificar_E(".$row[0].")'>Modificar</button>
				<button type='submit' class='alert-warning' name='ELIMINAR_E' onClick='Eliminar_E(".$row[0].")'>Eliminar</button>
			</td>
			</tr>
		";
		}
	echo"
		</table>
		</td>
		</tr>
		</table>
	";	
	}else{
		echo "Error al realizar la consulta en la base de datos. Consulte a soporte técnico.";
		}
mysqli_close($con);
}//FIN FUNCION CARGAR ESTUDIANTES

if ($_POST['TIPO']=="MODIFICAR"){ 
$Idestudiantes = $_POST['CODIGO'];
$Codigo = $_POST['CODIGO_E'];
$Nombres = $_POST['NOMBRES_E'];
$Apellidos = $_POST['APELLIDOS_E'];
$Fecha_Nacimiento = $_POST['FECHA_E'];
$Tipo_Sangre = $_POST['TIPOS_E'];
$Eps = $_POST['EPS_E'];
$Grado = $_POST['GRADO_E'];
$Direccion = $_POST['DIRECCION_E'];
$Telefono = $_POST['TELEFONO_E'];
$E_mail = $_POST['EMAIL_E'];
$sql = "update estudiantes set Codigo='".$Codigo."', Nombres='".$Nombres."', Apellidos='".$Apellidos."', Fecha_Nacimiento='".$Fecha_Nacimiento."', Tipo_Sangre='".$Tipo_Sangre."', Eps='".$Eps."', Grado='".$Grado."', Direccion='".$Direccion."', Telefono='".$Telefono."', E_mail='".$E_mail."' where Idestudiantes=".$Idestudiantes;
mysqli_query($con, $sql);
mysqli_close($con);	
}//FIN FUNCION MODIFICAR

if ($_POST['TIPO']=="ELIMINAR"){ 
$Idestudiantes = $_POST['CODIGO'];
$sql = "delete estudiantes.* from estudiantes where Idestudiantes=".$Idestudiantes;
mysqli_query($con, $sql);	
mysqli_close($con);	
}//FIN FUNCION MODIFICAR
?>