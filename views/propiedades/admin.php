<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Centrada</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4 text-center dark:text-white">Index</h1>
        <div class="text-center mb-4">
            <a href="signup" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Crear nuevo usuario</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Rol ID</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Contraseña</th>
                        <th class="py-3 px-6 text-left">Creación</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 dark:text-gray-200 text-sm font-light">
                    <?php
                    if ($usuario) {
                        foreach ($usuario as $fila) {
                            echo "<tr class='border-b border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700'>";
                            echo "<td class='py-3 px-6'>" . htmlspecialchars($fila['username']) . "</td>";
                            echo "<td class='py-3 px-6'>" . htmlspecialchars($fila['role_id']) . "</td>";
                            echo "<td class='py-3 px-6'>" . htmlspecialchars($fila['email']) . "</td>";
                            echo "<td class='py-3 px-6'>" . htmlspecialchars($fila['password']) . "</td>";
                            echo "<td class='py-3 px-6'>" . htmlspecialchars($fila['creacion']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='py-3 px-6 text-center'>No hay datos en la tabla</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
