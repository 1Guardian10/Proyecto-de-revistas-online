<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Noticias</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main>
        <h1 class="text-3xl font-bold mb-6 dark:text-gray-800 text-center pt-5">Listado mi contenido</h1>

        <div class="grid grid-cols-1 gap-4 p-10">
            <?php
            if ($contenidos) {
                foreach ($contenidos as $noticia) {
                    echo '<a href="/public/editar?id=' . $noticia['id'] . '&t=' . $noticia['plantilla_id'] . '" class=" bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">';
                    echo '<h2 class="text-xl font-semibold text-gray-800 dark:text-white">' . htmlspecialchars($noticia['titulo']) . '</h2>';
                    echo '<p class="text-gray-600 dark:text-gray-300">' . htmlspecialchars($noticia['descripcion']) . '</p>';
                    echo '<p class="text-gray-500 dark:text-gray-400">Publicado el: ' . htmlspecialchars($noticia['publicado']) . '</p>';
                    echo '</a>';
                }
            } else echo '<h2 class="text-3xl font-bold mb-6 dark:text-gray-800">Todavía no hay contenido</h2>';
            ?>
        </div>
    </main>
</body>

</html>