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
        <a class="nav-bar_a" href="?tabla=comentario">Comentarios</a>
        <a class="nav-bar_a current" href="?tabla=pedido">Pedidos</a>
        <a class="nav-bar_a" href="?tabla=producto">Productos</a>
        <a class="nav-bar_a" href="?tabla=usuario">Usuarios</a>
    </nav> 



    <input type="checkbox" id="sidebar-toggle" class="sidebar-toggle-checkbox">
<label for="sidebar-toggle" class="sidebar-toggle">Opciones</label>

    <div class="catalog-container">

        <main class="catalog-main">
            <!-- VOY A METER UN GRID BIEN INSANO -->
             <div class="catalog-grid">
                <!-- VOY A MEJORAR ESTE GRID BIEN INSANO CON PHP -->
                <?php
                    //preparo las variables para el query
                    $tabla = isset($_GET['tabla']) ? $_GET['tabla'] : "producto";
                    //consigo el valor ya puesto de page, si no esta ps 0
                    $tipo = "";
                    $orderBy = "";
                    
                    //preparo las variables para la conexion
                    $dbhost = "localhost";
                    $dbname = "MuKingg";
                    $dbuser = "root";
                    $dbpass = "";
                    $dbport = "3306";

                    //obtengo los datos
                    $query = "SELECT * FROM $tabla";
                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport) or die("*o*");
                    $res = mysqli_query($conexion, $query);
                    ?>
                    
                    <?php if (mysqli_num_rows($res) == 0) { ?>
                        <div class="catalog-grid_item">
                            No results Found
                        </div>
                    <?php } ?> 

                    <!-- loopeo sobre los datos -->
                    <div class="catalog-grid_item">
                        <table border="5">
                            <?php
                                $fields = mysqli_fetch_fields($res);
                                foreach ($fields as $field) {
                                    echo "<th>" . htmlspecialchars($field->name) . "</th>";
                            }
                            ?>
                            <?php while ($row = mysqli_fetch_assoc($res)) {?>
                            <tr>
                                    <?php foreach($row as $value) {?>
                                        <td><?php echo htmlspecialchars($value); ?></td>
                                    <?php } ?>

                                    <td><a href="?AAAAAaaa=1">X</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
             </div>
        </main>
    </div>


</body>
</html>