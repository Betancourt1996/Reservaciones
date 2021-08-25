<?php

if ($_GET["nombre"] && $_GET["contra"]) {

    $usuario = $_GET["nombre"];

    $contra = $_GET["contra"];
//    include_once 'imprimir.php';
    include_once 'conexion.php';
    $zona = '1';
    $sql_id_persona = "select persona from usuario where nombre='$usuario' and contrasena='$contra'";
    echo $sql_id_persona . '<br>';
    $result = $conn->query($sql_id_persona);


    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id_persona = $row["persona"];
        echo "id: " . $id_persona . "<br>";

        //ahora a reservar un lugar
        $sql_reservacion = "insert into reservacion(zona,fecha,horaInicio,horaFin,cliente)
Values('1','2021-08-24','13:00:00','14:00:00','$id_persona');";
        if ($conn->query($sql_reservacion) === true) {
            echo "Se ha reservado un lugar!";
        } else {
            echo "Error: " . "<br>" . $sql_reservacion . "<br>" . $conn->error;
        }
        //ahora a mostrar el registro en la tabla
        $sql_registro = "select ID_reservacion,zona,fecha,horaInicio,horaFin from reservacion;";
        $result = $conn->query($sql_registro);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["ID_reservacion"] . "-" . $row["zona"] . "-" . $row["fecha"] . "-" . $row["horaInicio"] . "-" . $row["horaFin"] . "<br>";
            }
        }
    } else {
        echo "0 results";
    }
}
?>