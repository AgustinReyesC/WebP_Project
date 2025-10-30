<?php

function echoTalla(String $talla){
    switch ($talla){
        case "p":
            echo "PEQUEÑO";
            break;
        
        case "m":
            echo "MEDIANO";
            break;

        case "g":
            echo "GRANDE";
            break;

        case "eg":
            echo "EXTRA GRANDE";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles_general.css">
    <link rel="stylesheet" href="../CSS/styles_catalog.css">
    <title>M.U. KINGG</title>
</head>
<body>
   

    <div class="logo-up logo-up_catalog">
        <img class="logo-up_logo" src="../IMG/logo.png" alt="Aqui el logo">
        <p class="logo-up_text logo-up_text-catalog">® All Rights Reserved</p>
    </div>


    <input type="checkbox" id="menu-toggle" class="menu-toggle-checkbox">
    <label for="menu-toggle" class="menu-toggle">☰</label>


    <nav class="nav-bar">
        <a class="nav-bar_a" href="../index.php">Home</a>
        <a class="nav-bar_a current" href="./catalogo.php">Catálogo</a>
        <a class="nav-bar_a" href="./contactanos.php">Contáctanos</a>
        <a class="nav-bar_a" href="./sobreNosotros.html">Sobre Nosotros</a>
        <a class="nav-bar_a" href="./login.php">Registro</a>
    </nav> 



    <input type="checkbox" id="sidebar-toggle" class="sidebar-toggle-checkbox">
<label for="sidebar-toggle" class="sidebar-toggle">Opciones</label>

    <div class="catalog-container">
        <aside class="sidebar">
            <h2 class="sidebar_categorias-title">Categorías</h2>
            <ul class="sidebar_categorias-list">
                <li class="sidebar_list-item"><a class="sidebar_categorias-item" href="#">Camisas</a></li>
                <li class="sidebar_list-item"><a class="sidebar_categorias-item" href="#">Pantalones</a></li>
                <li class="sidebar_list-item"><a class="sidebar_categorias-item" href="#">Sudaderas</a></li>
                <li class="sidebar_list-item"><a class="sidebar_categorias-item" href="#">Accesorios</a></li>
            </ul>
            <h2 class="sidebar_filtrar-title">Filtrar por</h2>
            <ul class="sidebar_filtrar-list">
                <li class="sidebar_list-item"><a class="sidebar_filtrar-item" href="#">Precio: Menor a Mayor</a></li>
                <li class="sidebar_list-item"><a class="sidebar_filtrar-item" href="#">Precio: Mayor a Menor</a></li>
                <li class="sidebar_list-item"><a class="sidebar_filtrar-item" href="#">Nuevos Productos</a></li>
            </ul>
        </aside>




        <main class="catalog-main">
            <!-- VOY A METER UN GRID BIEN INSANO -->
             <div class="catalog-grid">
                <!-- VOY A MEJORAR ESTE GRID BIEN INSANO CON PHP -->
                <?php
                    //preparo las variables para el query
                    $tabla = "producto";
                    //consigo el valor ya puesto de page, si no esta ps 0
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
                    $tipo = "";
                    $orderBy = "";
                    
                    //preparo las variables para la conexion
                    $dbhost = "localhost";
                    $dbname = "MuKingg";
                    $dbuser = "root";
                    $dbpass = "";
                    $dbport = "3306";

                    //obtengo los datos
                    $limI = $page * 6;
                    $limS = ($page + 1) * 6;
                    $query = "SELECT * FROM $tabla WHERE tipo LIKE '%$tipo%' and $limI < id and id <= $limS";
                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport) or die("*o*");
                    $res = mysqli_query($conexion, $query);

                    if (mysqli_num_rows($res) == 0) {
                        echo "No results found<br>";
                    } 
                    ?>

                    <!-- loopeo sobre los datos -->
                    <?php while ($row = mysqli_fetch_assoc($res)) {?>
                        <div class="catalog-grid_item">
                            <img src= <?php echo $row['imagen']; ?> alt="Item" class="catalog-grid_item-img"><br>
                            <p class="catalog-grid_item-description"><?php echo $row['tipo']; ?></p><br>
                            <p class="catalog-grid_item-description"> Talla: <?php echoTalla($row['talla']); ?> </p><br>
                            <p class="catalog-grid_item-description"><?php echo $row['precio']; ?></p><br>
                        </div>
                    <?php } ?>

                <div class="catalog-grid_next-page">
                    <?php if (!($page == 0)) {?>
                    <a class="catalog-grid_next-page-a" href="?page=<?php echo $page - 1; ?>"><< Previous Page</a>
                    <?php }?>
                    <?php if (!($page == 4)) {?>
                    <a class="catalog-grid_next-page-a" href="?page=<?php echo $page + 1; ?>">Next Page >></a>
                    <?php }?>
                </div>
             </div>
        </main>
    </div>


</body>
</html>