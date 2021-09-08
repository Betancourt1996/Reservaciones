<?php
$usuario = $_GET["nombre"];
$contra = $_GET["contra"];
if ($usuario && $contra) {
    include_once 'conexion.php';

    $sql_user = "select persona from usuario where nombre='$usuario' and contrasena='$contra';";
    $result_existe = $conn->query($sql_user);

    $sql_query = "select ID_reservacion,zona.nombre,fecha,horaInicio,horaFin,encargado,reservado,capacidad,Persona.nombre as encargadoNombre,Persona.apellido as encargadoApellido from reservacion inner join zona on reservacion.zona = zona.ID_lugar  inner join persona on reservacion.encargado = Persona.ID_Persona;";
    $result = $conn->query($sql_query);
    ?>
    <html>
        <head>
            <style>
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
            </style>
            <title>Horarios disponibles</title>
        </head>

        <body>
            <section>
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Nombre del lugar</th>
                        <th>Fecha</th>
                        <th>Hora de Inicio</th>
                        <th>Hora de Fin</th>
                        <th>Estado</th>
                        <th>Capacidad</th>
                        <th>Nombre del encargado</th>
                        <th>Apellido del encargado</th>

                    </tr>
                    <?php
                    if ($result_existe->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $estado = "Reservado";
                            if ($row["reservado"] == "0") {
                                $estado = "No reservado";
                            }
                            echo '<tr>
                    <td>' . $row["ID_reservacion"] . '</td>
                        <td>' . $row["nombre"] . '</td>
                    <td>' . $row["fecha"] . '</td>
                    <td>' . $row["horaInicio"] . '</td>
                    <td>' . $row["horaFin"] . '</td>
                    <td>' . $estado . '</td>
                    <td>' . $row["capacidad"] . '</td>
                    <td>' . $row["encargadoNombre"] . '</td>
                    <td>' . $row["encargadoApellido"] . '</td>
                  </tr>';
                        }
                    } else {
                        echo "No se encontro al usuario <br>";
                    }
                }
                ?>
            </table>
        </section>
        <form action='registrar.php' target="_blank" method='GET'>
            <label>Seleccione un id horario  </label>
            <input type="text" id="userIdSelect" name="userIdSelect" maxlength="2"  ><br>

            <input type = "submit" value="Enviar" />
        </form>
    </body>
</html>

