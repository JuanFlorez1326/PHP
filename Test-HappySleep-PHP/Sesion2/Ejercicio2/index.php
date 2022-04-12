<?php
$resultado = "";
$pesoVehiculo = $_POST['pesoCarro'];

$libra = $pesoVehiculo;
$kilo = 0.45;
$total = $libra * $kilo;

$capacidadMaxima = 551.15;

if($pesoVehiculo <= $capacidadMaxima && $pesoVehiculo >= 1){
    $resultado = "Su carro en Kilos pesa: $total KG. El peso del carro el Libras es:  $pesoVehiculo  LB. <br> Su carro puede pasar por el Viaducto";  
}
elseif($pesoVehiculo <= 0){
    $resultado = "Ingrese un peso valido en libras";
}
else{
    $resultado = "El vehiculo no puede pasar por el viaducto";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Camino Glorioso</title>
</head>
<body>
    <header class="divHeader">
        <h1>El Camino Glorioso</h1>
    </header>

    <main class="divMain">
        <div class="divInfo">
            <form method="POST" class="divForm">
    
                <p>Peso del carro:</p>
                <input type="number" name="pesoCarro" placeholder="Peso en Libras:"><br>
                <button class="btnCalcular">Calcular</button>
            </form>
            <p class="classResult"> <?php echo $resultado ?> </p>
        </div>
    </main>

    <footer class="divFooter">
        <h3>Camino Glorioso 2022 - Juan Pablo Patiño</h3>
    </footer>
</body>
</html>