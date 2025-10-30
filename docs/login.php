<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="../CSS/styles_general.css">
    <link rel="stylesheet" href="../CSS/styles_main.css">
    <link rel="stylesheet" href="../CSS/styles_sobre_nosotros.css">

    
    <link rel="stylesheet" href="../CSS/styles_contactanos.css">
    <link rel="stylesheet" href="../CSS/styles_login.css">

    
    <title>M.U. KINGG</title>
</head>
<body>
    <main>
    <header class="titulo">
        <img class="logo-header" src="../IMG/logo.png" alt="Aqui el logo">
        <h1 class="brand-title">M.U. Kingg</h1>
    </header>
        <input type="checkbox" id="menu-toggle" class="menu-toggle-checkbox">
        <label for="menu-toggle" class="menu-toggle">☰</label>
        <nav class="nav-bar">
            <a class="nav-bar_a" href="../index.php">Home</a>
            <a class="nav-bar_a" href="./catalogo.php">Catálogo</a>
            <a class="nav-bar_a" href="./contactanos.php">Contáctanos</a>
            <a class="nav-bar_a" href="./sobreNosotros.html">Sobre Nosotros</a>
            <a class="nav-bar_a current" href="./login.php">Registro</a>
        </nav> 
        <div class="contenidoPrincipal-bg">
            <div class="contenidoPrincipal">
                <form class = "contactanos-form" action="">
                    <input type="text" name="CORREO" id="CORREO" class="entradaDeTexto" placeholder="correo@correo.com">
                    <input type="password" name="CONTRA" id="CONTRA" class="entradaDeTexto" placeholder="porfavor no 123456...">
                    <input type="submit" class="search-bar_button" name="REGISTRARSE" id="REGISTRARSE" value="REGISTRARSE"> 
                </form>
            </div>
        </div>
    </main>

</body>
</html>
