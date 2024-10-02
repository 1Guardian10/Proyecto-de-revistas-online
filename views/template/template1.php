<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function previewImage(event, imgElementId) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgElement = document.getElementById(imgElementId);
                imgElement.src = e.target.result;
                imgElement.style.display = 'block'; // Asegúrate de mostrar la imagen
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</head>

<body class="h-screen flex justify-center items-center bg-gradient-to-r from-black via-green-500 to-black">
    <div class="grid grid-cols-12 gap-4 w-full h-full">
        <div class="col-span-3 flex justify-center items-center"></div>
        <form method="post" action="<?php if (isset($resultados)) echo '/public/editarContenido';
                                    else echo '/public/agregarContenido'; ?>" class="col-span-6 h-full" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo htmlspecialchars(isset($_GET['id']) ? $_GET['id'] : ''); ?>">
            <input type="hidden" name="t" value="<?php echo htmlspecialchars(isset($_GET['t']) ? $_GET['t'] : ''); ?>">
            <div class="col-span-6 flex justify-center bg-gray-200 p-6 rounded-lg shadow-lg w-full h-full">
                <div class="container mx-auto h-full">
                    <div class="grid grid-rows-3 grid-cols-2 gap-4 h-full px-4">
                        <!-- Imágenes -->
                        <?php
                        $maxImagenes = 1; // Cambia este valor si deseas más imágenes
                        for ($index = 0; $index < $maxImagenes; $index++):
                            // Verifica que $resultados y la imagen existan
                            $imagen = isset($resultados[0]['imagenes'][$index]) ? $resultados[0]['imagenes'][$index] : null; // Usar isset para evitar advertencias

                        ?>
                            <div class="col-span-2 row-span-1 mx-auto">
                                <img src="<?= $imagen ? '/src/img/' . $imagen['imagen'] : '/src/img/paisaje.jpg' ?>" alt="" class="rounded-full border-2 border-black" width="350px" height="250px" id="image-preview-<?= $index ?>" style="<?= $imagen ? 'display:block;' : 'display:none;' ?>">
                                <input type="file" name="contenido[imagen][<?= $index ?>]" id="file-upload-<?= $index ?>" accept="image/*" onchange="previewImage(event, 'image-preview-<?= $index ?>')">
                                <input type="hidden" name="contenido[imagen_id][<?= $index ?>]" value="<?= $imagen['id'] ?? '' ?>">
                            </div>
                        <?php endfor; ?>

                        <!-- Título -->
                        <div class="col-span-1 row-span-1">
                            <input type="text" class="bg-gray-200 text-black placeholder-gray-500 p-3 rounded-md shadow-sm w-full" name="contenido[titulo]" value="<?= $resultados[0]['contenido']['titulo'] ?? '' ?>" placeholder="Título" required>
                        </div>

                        <!-- Descripción -->
                        <div class="col-span-1 row-span-1">
                            <input type="text" class="bg-gray-200 text-black placeholder-gray-500 p-3 rounded-md shadow-sm w-full" name="contenido[descripcion]" value="<?= $resultados[0]['contenido']['descripcion'] ?? '' ?>" placeholder="Descripción" required>
                        </div>

                        <!-- Subtítulos y Párrafos -->
                        <?php
                        $maxSubtitulos = 2; // Cambia este valor si deseas más subtítulos
                        for ($index = 0; $index < $maxSubtitulos; $index++):
                            $subtitulo = $resultados[0]['subtitulos'][$index] ?? null;
                            $parrafo = $resultados[0]['parrafos'][$index] ?? null;
                        ?>
                            <div class="col-span-1 row-span-1">
                                <input type="text" class="bg-transparent text-black placeholder-black p-2 w-[80%]" name="contenido[subtitulo][<?= $index ?>]" value="<?= $subtitulo['subtitulo'] ?? '' ?>" placeholder="Subtítulo">
                                <textarea name="contenido[parrafo][<?= $index ?>]" class="w-[90%] h-[80%] bg-transparent placeholder-black border-2 border-black" placeholder="Contenido"><?= $parrafo['parrafo'] ?? '' ?></textarea>
                                <input type="hidden" name="contenido[subtitulo_id][<?= $index ?>]" value="<?= $subtitulo['id'] ?? '' ?>">
                                <input type="hidden" name="contenido[parrafo_id][<?= $index ?>]" value="<?= $parrafo['id'] ?? '' ?>">
                            </div>
                        <?php endfor; ?>

                    </div>
                </div>
            </div>
            <button type="submit" class="mt-4 p-2 bg-blue-500 text-white rounded">Enviar</button>
        </form>
    </div>
</body>

</html>