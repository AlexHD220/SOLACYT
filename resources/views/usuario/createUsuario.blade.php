<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

    <h1>Iniciar sesión</h1>

    <form action="/usuario" method="post"> <!--la diagonal me envia al principio de la url "solacyt.test/"-->

        @csrf <!--permite entrar al formulario muy importante agregar-->

        <label for="usuario"><b> Usuario: </b></label>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario" required><br><br>


        <label for = "correo"><b>Correo: </b></label>
        <input type="email" name="correo"><br><br>

        <!-- <label for="pass"><b> Contraseña: </b></label> -->
        <!-- <input type="password" id="pass" name="pass" required style="width: 250px;"><br><br> -->

        <input type="submit" value="Enviar">
    </form>

</body>
</html>