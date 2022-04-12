<?php
include("database.php");
if ($_POST['TIPO']=="LISTAR"){
	$sql = "SELECT Idprofesores,Cedula,Nombres,Apellidos,Telefono,E_mail from profesores order by Idprofesores"; 
    $tabla="<div class='box-body'><table id='detalle1' class='table table-bordered table-striped table-condensed'>
                 <thead>
                        <tr>
                          <th>Cedula</th>
						  <th>Nombres</th>
						  <th>Apellidos</th>
						  <th>Telefono</th>
						  <th>E_mail</th>
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
					<td>
                       <button type='submit' name='ADMINISTRAR' onClick='Administrar(".$row[0].")'>Administrar</button>
                     </td>
                    </tr>";
            }
            $tabla=$tabla.$datos;
            echo $tabla."</tbody></table> <br> <b>Total de Registros: </b>".$count;
			mysqli_close($con);	
	}else{
		echo "<b>No existen acudientes creados.</b>";
		}
}//FIN FUNCION LISTAR PROFESORES

if ($_POST['TIPO']=="NUEVO"){
	$sql = "insert into profesores(Cedula,Nombres,Apellidos,Telefono,E_mail) values('".$_POST['CEDULA_P']."','".$_POST['NOMBRES_P']."','".$_POST['APELLIDOS_P']."','".$_POST['TELEFONO_P']."','".$_POST['E_MAIL_P']."')";
	mysqli_query($con, $sql);
	mysqli_close($con);		
}//FIN FUNCION NUEVO PROFESOR

if ($_POST['TIPO']=="CARGAR"){ 
$Cedula = $_POST['CEDULA'];
$sql = "select Idprofesores,Cedula,Nombres,Apellidos,Telefono,E_mail from profesores where Idprofesores=".$Cedula;
$result=mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($count>0) {
	echo"
		<table width='' border='0' cellspacing='0' cellpadding='1'>
		<tr bgcolor='#2196f3' align='center'>
		<td><b><font color='#FFFFFF'>Información de Registro a Modificar</font></b></td>
		</tr>
		<tr bgcolor='#2196f3'>
		<td>
		<table width='100%' border='0' cellspacing='0' cellpadding='4'>
	";
	while($row = mysqli_fetch_row($result)){
		echo"
			<tr bgcolor='#FFFFFF'>
			<td>
				<b>Cedula del Profesor: </b> <br>
				<input type='text' id='CEDULA_P' value='".$row[1]."'><br>
				<b>Nombres del Profesor: </b> <br>
				<input type='text' id='NOMBRES_P' value='".$row[2]."'><br>
				<b>Apellidos del Profesor: </b> <br>
				<input type='text' id='APELLIDOS_P' value='".$row[3]."'><br>
				<b>Telefono del Profesor: </b> <br>
				<input type='text' id='TELEFONO_P' value='".$row[4]."'><br>
				<b>E_mail del Profesor: </b> <br>
				<input type='text' id='E_MAIL_P' value='".$row[5]."'><br>
			</td>
			</tr>
			<tr bgcolor='#FFFFFF'>
			<td>
				<button type='submit' class='alert-primary' name='MODIFICAR_P' onClick='Modificar_P(".$row[0].")'>Modificar</button>
				<button type='submit' class='alert-warning' name='ELIMINAR_P' onClick='Eliminar_P(".$row[0].")'>Eliminar</button>
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
}//FIN FUNCION CARGAR PROFESOR

if ($_POST['TIPO']=="MODIFICAR"){ 
$Idprofesores = $_POST['CEDULA'];
$Cedula = $_POST['CEDULA_P'];
$Nombres = $_POST['NOMBRES_P'];
$Apellidos = $_POST['APELLIDOS_P'];
$Telefono = $_POST['TELEFONO_P'];
$E_mail = $_POST['E_MAIL_P'];
$sql = "update profesores set Cedula='".$Cedula."', Nombres='".$Nombres."', Apellidos='".$Apellidos."', Telefono='".$Telefono."', E_mail='".$E_mail."'       where Idprofesores=".$Idprofesores;
mysqli_query($con, $sql);
mysqli_close($con);	
}//FIN FUNCION MODIFICAR PROFESORES

if ($_POST['TIPO']=="ELIMINAR"){ 
$Idprofesores = $_POST['CEDULA'];
$sql = "delete profesores.* from profesores where Idprofesores=".$Idprofesores;
mysqli_query($con, $sql);	
mysqli_close($con);	
}//FIN FUNCION MODIFICAR
?>