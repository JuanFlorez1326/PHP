<?php
include("database.php");
if ($_POST['TIPO']=="LISTAR"){
	$sql = "SELECT Idasignaturas,Codigo,Nombre from asignaturas order by Idasignaturas"; 
    $tabla="<div class='box-body'><table id='detalle1' class='table table-bordered table-striped table-condensed'>
                 <thead>
                        <tr>
                          <th>Código</th>
                          <th>Asignatura</th>
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
                    <td>
                       <button type='submit' name='ADMINISTRAR' onClick='Administrar(".$row[0].")'>Administrar</button>
                     </td>
                    </tr>";
            }
            $tabla=$tabla.$datos;
            echo $tabla."</tbody></table> <br> <b>Total de Registros: </b>".$count;
			mysqli_close($con);	
	}else{
		echo "<b>No existen asignaturas académicas creadas.</b>";
		}
}//FIN FUNCION LISTAR ASIGNATURAS

if ($_POST['TIPO']=="NUEVO"){
	$sql = "insert into asignaturas(Codigo,Nombre) values('".$_POST['CODIGO_M']."','".$_POST['NOMBRE_M']."')";
	mysqli_query($con, $sql);
	mysqli_close($con);		
}//FIN FUNCION NUEVO

if ($_POST['TIPO']=="CARGAR"){ 
$Codigo = $_POST['CODIGO'];
$sql = "select Idasignaturas,Codigo,Nombre from asignaturas where Idasignaturas=".$Codigo;
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
				<b>Código: </b> <br>
				<input type='text' id='CODIGO_M' value='".$row[1]."'><br>
				<b>Nombre: </b> <br>
				<input type='text' id='NOMBRE_M' value='".$row[2]."'><br>
			</td>
			</tr>
			<tr bgcolor='#FFFFFF'>
			<td>
				<button type='submit' class='alert-primary' name='MODIFICAR_M' onClick='Modificar_M(".$row[0].")'>Modificar</button>
				<button type='submit' class='alert-warning' name='ELIMINAR_M' onClick='Eliminar_M(".$row[0].")'>Eliminar</button>
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
}//FIN FUNCION CARGAR

if ($_POST['TIPO']=="MODIFICAR"){ 
$Idasignaturas = $_POST['CODIGO'];
$Codigo = $_POST['CODIGO_M'];
$Nombre = $_POST['NOMBRE_M'];
$sql = "update asignaturas set Codigo='".$Codigo."', Nombre='".$Nombre."' where Idasignaturas=".$Idasignaturas;
mysqli_query($con, $sql);
mysqli_close($con);	
}//FIN FUNCION MODIFICAR

if ($_POST['TIPO']=="ELIMINAR"){ 
$Idasignaturas = $_POST['CODIGO'];
$sql = "delete asignaturas.* from asignaturas where Idasignaturas=".$Idasignaturas;
mysqli_query($con, $sql);	
mysqli_close($con);	
}//FIN FUNCION MODIFICAR
?>