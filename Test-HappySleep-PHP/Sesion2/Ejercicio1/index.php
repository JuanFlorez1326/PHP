<?php
if(isset($_POST['registrar'])){

    $nombreCompleto= $_POST['nombreCompleto'];
    $edad = $_POST['edad'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $numeroDocumento = $_POST['numeroDocumento'];
    $dineroDisponible = $_POST['dineroDisponible'];

    $cadenaDocumento = substr($numeroDocumento , 0 , 4);
    $resultado = "";

    if($edad > 21){
        if($tipoDocumento == 'Cedula Colombiana'){
            if($dineroDisponible >= 25000){             
                if($cadenaDocumento == 1094){
                    $resultado = "Si puede Ingresar";                   
                }else{
                    $resultado = "No puede Ingresar";
                }
            }else{
                $resultado = "No puede Ingresar";
            }
        }else{
            $resultado = "No puede Ingresar";
        }
    }else{
        $resultado = "No puede Ingresar";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Discoteca</title>
</head>
<body>
    <header class="divHeader">
        <h1>Discoteca</h1>
    </header>
    
    <main>
        <div class="divInfo">
            <form method="POST" class="divForm">
                            
                <p>Nombre completo:</p>
                <input type="text" name="nombreCompleto" placeholder="Nombre:"><br>

                <p>Edad:</p>
                <input type="number" name="edad" placeholder="Edad:"><br>

                <p>Tipo documento:</p>
                <select name="tipoDocumento">

                    <option value="Seleccionar">Seleccionar</option>
                    <option value="Cedula Colombiana">Cedula Colombiana</option>
                    <option value="Cedula Extranjeria">Cedula de Extranjeria</option>
                    <option value="Pasaporte">Pasaporte</option>

                </select>

                <p>Numero de documento:</p>
                <input type="text" name="numeroDocumento" placeholder="Numero:"><br>

                <p>Dinero disponible:</p>
                <input type="number" name="dineroDisponible" placeholder="Dinero:"><br>

                <button class="btnRegistrar" name="registrar">Enviar</button>

                <h4 class="resultForm"> <?php echo $resultado ?> </h4>

            </form>
        </div>
    </main>

    <Footer class="divFooter">
        <h3>Discoteca 2022 - Juan Pablo Patiño</h3>
    </Footer>
</body>
</html>