<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action='insertar.php' target="_blank" method='GET'>

            
            <label for="nombre">Nombre de Usuario</label><br>
            <input type="text" id="nombre" name="nombre" maxlength="50"><br>

              
            <label for="contra">Contraseña</label><br>
            <input type="password" id="contra" name="contra"maxlength="50" ><br>
            <input type = "submit" value="Enviar" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
