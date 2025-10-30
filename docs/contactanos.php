<?php
//si se recargo la pagina mediante post y fue por un boton con nombre ENVIAR
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ENVIAR'])) {
    //$comentario = trim($_POST['COMENTARIO']);

    $dbhost = "localhost";
    $dbname = "MuKingg";
    $dbuser = "root";
    $dbpass = "";

    $comentario = $_POST["COMENTARIO"];

    if (($comentario != ""))
    {
        $sql = "INSERT INTO comentarios (descripcion) VALUES ('$comentario')";

        $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, "3306") or die("*o*");
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
    }

    //mando el comentario a la bdd
    //creo el mensaje de confirmacion
    $mensaje = "¡Comentario enviado correctamente!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles_general.css">
    <link rel="stylesheet" href="../css/styles_main.css">
    <link rel="stylesheet" href="../CSS/styles_sobre_nosotros.css">
    <link rel="stylesheet" href="../CSS/styles_contactanos.css">
    <title>M.U. KINGG</title>
</head>
<body>
    <header class="titulo">
        <img class="logo-header" src="../IMG/logo.png" alt="Aqui el logo">
        <h1 class="brand-title">M.U. Kingg</h1>
    </header>
    <main>
        <input type="checkbox" id="menu-toggle" class="menu-toggle-checkbox">
        <label for="menu-toggle" class="menu-toggle">☰</label>
        <nav class="nav-bar">
            <a class="nav-bar_a" href="../index.html">Home</a>
            <a class="nav-bar_a" href="./catalogo.html">Catálogo</a>
            <a class="nav-bar_a current" href="./contactanos.php">Contáctanos</a>
            <a class="nav-bar_a" href="./sobreNosotros.html">Sobre Nosotros</a>
            <a class="nav-bar_a" href="./login.html">Registro</a>
        </nav> 
        <div class="contenidoPrincipal-bg">
            <div class="contenidoPrincipal">
                <form class = "contactanos-form" action="" method="post">
                    <textarea class="comentarios" name="COMENTARIO" rows="10" cols="40" placeholder="Comentarios..."></textarea>
                    <input type="submit" class="search-bar_button" name="ENVIAR" id="ENVIAR" value="ENVIAR"> 
                </form>
            </div>

            <div class="contenidoPrincipal">
                <div class="contenidoPrincipal-parrafo">
                    Correo: goodolTimes@gmail.com
                </div>
                <div class="contenidoPrincipal-parrafo">
                    Tel: 871-412-0441
                </div>
                    
                <div class="contenidoPrincipal-parrafo">
                    Dirección:
                </div>
                <div class="contenidoPrincipal-parrafo">
                    Av. del Sol 1234, Piso 5
                    Col. Jardines del Este
                    Ciudad Lumina, CP 56789
                    México
                </div>
                
                <?php if(isset($mensaje)) { ?>
                    <div class="mensaje-envio"> <br><?php echo $mensaje; ?><br></div>
                <?php } ?>
            </div>
        </div>
    </main>

</body>
</html>