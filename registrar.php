<?php

$userIdSelect = $_GET["userIdSelect"];
if ($userIdSelect) {
    include_once 'conexion.php';
    $Update_id_Sql="update reservacion set reservado=true where ID_reservacion='$userIdSelect';";
    $conn->query($Update_id_Sql);
    $sql_query = "select ID_reservacion,zona.nombre,fecha,horaInicio,horaFin,encargado,reservado,capacidad,Persona.nombre as encargadoNombre,Persona.apellido as encargadoApellido from reservacion inner join zona on reservacion.zona = zona.ID_lugar  inner join persona on reservacion.encargado = Persona.ID_Persona where ID_reservacion='$userIdSelect';";
    $registrado = $conn->query($sql_query);
    if ($registrado->num_rows > 0) {
        echo "Reservacion Realizada <br>";
        while ($row = $registrado->fetch_assoc()) {
            echo $row["ID_reservacion"]."-".$row["nombre"]."-".$row["fecha"]."-".$row["horaInicio"]."-".$row["horaFin"]."-".$row["reservado"]."-".$row["capacidad"]."-".$row["encargadoNombre"]."-".$row["encargadoApellido"]."<br>";
        }
    } else {
        echo "No ingreso un Id";
}}
?>