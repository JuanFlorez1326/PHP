<?php
include("database.php");
if ($_POST['TIPO']=="LISTAR"){
	$sql = "SELECT Idacudientes,Cedula,Nombres,Apellidos,Direccion,Telefono,E_mail from acudientes order by Idacudientes"; 
    $tabla="<div class='box-body'><table id='detalle1' class='table table-bordered table-striped table-condensed'>
                 <thead>
                        <tr>
                          <th>Cedula</th>
						  <th>Nombres</th>
						  <th>Apellidos</th>
						  <th>Direccion</th>
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
					<td>".$row[6]."</td>
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
}//FIN FUNCION LISTAR acudientes

if ($_POST['TIPO']=="NUEVO"){
	$sql = "insert into acudientes(Cedula,Nombres,Apellidos,Direccion,Telefono,E_mail) values('".$_POST['CEDULA_A']."','".$_POST['NOMBRES_A']."','".$_POST['APELLIDOS_A']."','".$_POST['DIRECCION_A']."','".$_POST['TELEFONO_A']."','".$_POST['E_MAIL_A']."')";
	mysqli_query($con, $sql);
	mysqli_close($con);		
}//FIN FUNCION NUEVO acudientes

if ($_POST['TIPO']=="CARGAR"){ 
$Cedula = $_POST['CEDULA'];
$sql = "select Idacudientes,Cedula,Nombres,Apellidos,Direccion,Telefono,E_mail from acudientes where Idacudientes=".$Cedula;
$result=mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($count>0) {
	echo"
		<table width='' border='5' cellspacing='0' cellpadding='2'>
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
				<b>Cedula Acudiente: </b> <br>
				<input type='text' id='CEDULA_A' value='".$row[1]."'><br>
				<b>Nombres Acudiente: </b> <br>
				<input type='text' id='NOMBRES_A' value='".$row[2]."'><br>
				<b>Apellidos Acudiente: </b> <br>
				<input type='text' id='APELLIDOS_A' value='".$row[3]."'><br>
				<b>Direccion Acudiente: </b> <br>
				<input type='text' id='DIRECCION_A' value='".$row[4]."'><br>
				<b>Telefono Acudiente: </b> <br>
				<input type='text' id='TELEFONO_A' value='".$row[5]."'><br>
				<b>E_mail Acudiente: </b> <br>
				<input type='text' id='E_MAIL_A' value='".$row[6]."'><br>
			</td>
			</tr>
			<tr bgcolor='#FFFFFF'>
			<td>
				<button type='submit' class='alert-primary' name='MODIFICAR_A' onClick='Modificar_A(".$row[0].")'>Modificar</button>
				<button type='submit' class='alert-warning' name='ELIMINAR_A' onClick='Eliminar_A(".$row[0].")'>Eliminar</button>
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
}//FIN FUNCION CARGAR ACUDIENTE

if ($_POST['TIPO']=="MODIFICAR"){ 
$Idacudientes = $_POST['CEDULA'];
$Cedula = $_POST['CEDULA_A'];
$Nombres = $_POST['NOMBRES_A'];
$Apellidos = $_POST['APELLIDOS_A'];
$Direccion = $_POST['DIRECCION_A'];
$Telefono = $_POST['TELEFONO_A'];
$E_mail = $_POST['E_MAIL_A'];
$sql = "update acudientes set Cedula='".$Cedula."', Nombres='".$Nombres."', Apellidos='".$Apellidos."', Direccion='".$Direccion."', Telefono='".$Telefono."', E_mail='".$E_mail."'   where Idacudientes=".$Idacudientes;
mysqli_query($con, $sql);
mysqli_close($con);	
}//FIN FUNCION MODIFICAR ACUDIENTES

if ($_POST['TIPO']=="ELIMINAR"){ 
$Idacudientes = $_POST['CEDULA'];
$sql = "delete acudientes.* from acudientes where Idacudientes=".$Idacudientes;
mysqli_query($con, $sql);	
mysqli_close($con);	
}//FIN FUNCION ELIMINAR
?>