<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso a juegos mecanicos</title>
</head>
<body>
    <form method="post">
        <h4>Formulario</h4>
        <input  type="text" name="nombre" placeholder="Nombre"><br>
        <input  type="text" name="altura" placeholder="Altura (cm)">
        <br><br>
        <input type="date" name="fechanac">

        <br><br>
        ¿Rechaza llevarnos a juicio por daños y perjuicios de un mal mantenimiento?
        <br>
        <input type="radio" checked=true name="Opcion" value="Si">Si
        <input type="radio" checked=true name="Opcion" value="No">No
        
        <br><br>
        <input type="submit" name="Comprobar" value="Comprobar">

    </form>
</body>
</html>
<?php

if((isset($_POST["Comprobar"]) && !empty($_POST["Comprobar"]))){
    
    $Nombre= $_POST["nombre"];
    $Altura= $_POST["altura"];
    $Aceptaccion= $_POST["Opcion"];

    if(($Nombre != "") && ($Altura != "")){

        $fechaN=$_POST["fechanac"];
        $hoy =date("Y-m-d");
        $edad = date_diff(date_create($fechaN), date_create($hoy));
        $can=$edad->format('%y');
        
        if($Aceptaccion == "Si")
        {
                if(($can>=0)&&($can<16)){
                    echo $Nombre. ", <br> es menor de 16 años de edad, no puede ingresar al juego mecanico";
                }else if(($can>=16)){
                    if($Altura>=120){
                        echo "Bienvenido, cumple con la edad para ingresar al juego mecanico...<br><br>"; 
                        echo "
                        ************************************************************<br><br>
                        
                        Ticket N.: " .rand(00001,99999). "<br>
                        Nombre del usuario: " .$Nombre. "<br>
                        <br><br>

                        Gracias por su visita.<br>
                        ************************************************************<br><br>";
                    }
                    else{
                        echo $Nombre. ", <br>su estatura es muy baja para ingresar a este juego mecanico";
                    }
                }
            }
        else
        {
            echo "<br><br>Gracias por su comprension, que tenga un feliz dia"; 
        }
    }
}
?>