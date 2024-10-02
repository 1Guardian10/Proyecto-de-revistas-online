<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Vista de Contenido</title>
</head>

<body >
    <!-- Contenedor principal del contenido -->
    <div class="p-8 border-b border-gray-300 max-w-[50%] mx-auto bg-[#f9f2eb]">
        <!-- Título -->
        <h1 class="font-bold border-b border-gray-300 w-full p-2 mb-2 bg-[#f9f2eb] shadow-md"><?php echo $resultados[0]['contenido']['titulo']; ?></h1>
        
        <!-- Sección 1 -->
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1 row-span-1">
                <!-- Subtítulo 1 -->
                <h2 class="text-[#5a3d31] w-[80%]"><?php echo $resultados[0]['subtitulos'][0]['subtitulo']; ?></h2>
                <!-- Contenido de Sección 1 -->
                <p class="bg-[#f9f2eb] p-2 w-full h-[80%] mt-3 shadow-md"><?php echo $resultados[0]['parrafos'][0]['parrafo']; ?></p>
            </div>
            <div class="col-span-1 row-span-1 justify-center items-center mx-auto">
                <!-- Imagen de Sección 1 -->
                <img src="/./src/img/<?php echo $resultados[0]['imagenes'][0]['imagen']; ?>" width="200px" class="rounded-lg" height="150px" alt="Imagen de referencia 1">
            </div>
        </div>

        <!-- Sección 2 -->
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1 row-span-1 justify-center items-center mx-auto">
                <!-- Imagen de Sección 2 -->
                <img src="/./src/img/<?php echo $resultados[0]['imagenes'][0]['imagen']; ?>" width="200px" class="rounded-lg" height="150px" alt="Imagen de referencia 2">
            </div>
            <div class="col-span-1 row-span-1">
                <!-- Subtítulo 2 -->
                <h2 class="text-[#5a3d31] w-[80%]"><?php echo $resultados[0]['subtitulos'][1]['subtitulo']; ?></h2>
                <!-- Contenido de Sección 2 -->
                <p class="bg-[#f9f2eb] p-2 w-full h-[80%] mt-3 shadow-md"><?php echo $resultados[0]['parrafos'][1]['parrafo']; ?></p>
            </div>
        </div>

        <!-- Sección 3 -->
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1 row-span-1">
                <!-- Subtítulo 3 -->
                <h2 class="text-[#5a3d31] w-[80%]"><?php echo $resultados[0]['subtitulos'][2]['subtitulo']; ?></h2>
                <!-- Contenido de Sección 3 -->
                <p class="bg-[#f9f2eb] p-2 w-full h-[80%] mt-3 shadow-md"><?php echo $resultados[0]['parrafos'][2]['parrafo']; ?></p>
            </div>
            <div class="col-span-1 row-span-1 justify-center items-center mx-auto">
                <!-- Imagen de Sección 3 -->
                <img src="/./src/img/<?php echo $resultados[0]['imagenes'][0]['imagen']; ?>" width="200px" class="rounded-lg" height="150px" alt="Imagen de referencia 3">
            </div>
        </div>

        <div class="mt-4">
            <h2 class="text-[#5a3d31] font-semibold">Descripción:</h2>
            <p class="bg-[#f9f2eb] p-2 w-full mt-2 shadow-md">
            <?php echo $resultados[0]['contenido']['descripcion']; ?>
            </p>
        </div>
        <!-- Botón de volver -->
        <div class="mt-8 text-center">
            <button type="button" onclick="history.back()"
                class="bg-[#e2d1c3] text-[#5a3d31] font-bold py-2 px-6 rounded shadow hover:bg-[#d6bba9] transition">
                Volver
            </button>
        </div>
    </div>
</body>

</html>
