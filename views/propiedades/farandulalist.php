<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Centrada</title>
    <style>
        /* Centrar todo el contenido */
        body, html {
            justify-content: center; /* Centrado horizontal */
            align-items: center; /* Centrado vertical */
            text-align: center; /* Centra el texto */
        }
        
        /* Ajustes para el contenedor */
        .container {
            width: 80%;
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Quita los espacios entre bordes */
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
        }

        img {
            max-width: 50px;
            height: auto;
        }

        a {
            display: block;
            margin-bottom: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Index</h1>
        <a href="farandula/frandulaCrear">Crear nuevo usuario</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>fecha</th>
                    <th>portada</th>
                    <th>tematica</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($farandula) {
                    // Usar un foreach para recorrer los datos
                    foreach ($farandula as $fila) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['fecha'] . "</td>";
                        echo "<td><img src='" .'/../src/img/' .$fila['portada'] . "' alt='foto'></td>";
                        echo "<td>" . $fila['tematica'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay datos en la tabla</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
