<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

    <h1>Iniciar sesión</h1>

    <form action="/usuario" method="post">

        @csrf <!--permite entrar al formulario muy importante agregar-->

        <label for="usuario"><b> Usuario: </b></label>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario" required><br>


        <label for = "correo">Correo</label><br>
        <input type="email" name="correo"><br><br>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>