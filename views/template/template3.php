<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Formulario Optimizado</title>
</head>

<body class="bg-[#f9f2eb]">
    <!-- Contenedor principal del formulario -->
    <div class="p-8 border-b border-gray-300 max-w-[50%] mx-auto">
        <!-- Formulario con layout de columnas y filas -->
        <form action="/public/listarContenidof" method="post" enctype="multipart/form-data" class="grid gap-8">
            <!-- Título (convertido en input) -->
            <input type="text" id="titulo" name="contenido[titulo]"
                class=" font-bold border-b border-gray-300 w-full p-2 mb-2 bg-[#f9f2eb] outline-none shadow-md focus:shadow-lg"
                placeholder="Título">

            <!-- Sección 1 -->
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1 row-span-1">
                    <input type="text" class="bg-transparent text-[#5a3d31] placeholder-[#5a3d31] w-[80%]" placeholder="Subtítulo" name="contenido[subtitulo][0]" id="">
                    <textarea name="contenido[parrafo][0]"
                        class="bg-[#f9f2eb] p-2 w-full h-[80%] mt-3 outline-none shadow-md focus:shadow-lg" placeholder="Contenido Sección 1"
                        rows="2"></textarea>
                </div>
                <div class="col-span-1 row-span-1 justify-center items-center mx-auto">
                    <img src="/src/img/paisaje.jpg" width="200px" class="rounded-lg" height="150px" alt="">
                    <input type="file" name="contenido[imagen][0]"
                        class="bg-[#e2d1c3] text-[#5a3d31] mb-4 p-3 mt-2 cursor-pointer hover:bg-[#d6bba9] outline-none"
                        accept="image/*">
                </div>
            </div>

            <!-- Sección 2 -->
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1 row-span-1 justify-center items-center mx-auto">
                    <img src="/src/img/paisaje.jpg" width="200px" class="rounded-lg" height="150px" alt="">
                    <input type="file" name="contenido[imagen][1]"
                        class="bg-[#e2d1c3] text-[#5a3d31] mb-4 p-3 mt-2 cursor-pointer hover:bg-[#d6bba9] outline-none"
                        accept="image/*">
                </div>
                <div class="col-span-1 row-span-1">
                    <input type="text" class="bg-transparent text-[#5a3d31] placeholder-[#5a3d31] w-[80%]" placeholder="Subtítulo" name="contenido[subtitulo][1]" id="">
                    <textarea name="contenido[parrafo][1]"
                        class="bg-[#f9f2eb] p-2 w-full h-[80%] mt-3 outline-none shadow-md focus:shadow-lg" placeholder="Contenido Sección 2"
                        rows="2"></textarea>
                </div>
            </div>

            <!-- Sección 3 -->
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1 row-span-1">
                    <input type="text" class="bg-transparent text-[#5a3d31] placeholder-[#5a3d31] w-[80%]" placeholder="Subtítulo" name="contenido[subtitulo][2]" id="">
                    <textarea name="contenido[parrafo][2]"
                        class="bg-[#f9f2eb] p-2 w-full h-[80%] mt-3 outline-none shadow-md focus:shadow-lg" placeholder="Contenido Sección 3"
                        rows="2"></textarea>
                </div>
                <div class="col-span-1 row-span-1 justify-center items-center mx-auto">
                    <img src="/src/img/paisaje.jpg" width="200px" class="rounded-lg" height="150px" alt="">
                    <input type="file" name="contenido[imagen][2]"
                        class="bg-[#e2d1c3] text-[#5a3d31] mb-4 p-3 mt-2 cursor-pointer hover:bg-[#d6bba9] outline-none"
                        accept="image/*">
                </div>
            </div>

            <div class="mt-4">
                <h2 class="text-[#5a3d31] font-semibold">Descripción:</h2>
                <textarea name="contenido[descripcion]" class="bg-[#f9f2eb] p-2 w-full mt-2 shadow-md h-28 resize-none" placeholder="Agrega la descripción aquí..."></textarea>
            </div>
            <!-- Botón de envío -->
            <div class="mt-8 text-center">
                <button type="submit"
                    class="bg-[#e2d1c3] text-[#5a3d31] font-bold py-2 px-6 rounded shadow hover:bg-[#d6bba9] transition">
                    Enviar
                </button>
            </div>
        </form>
    </div>

    <script>
        // Ajustar altura del textarea según el contenido
        document.querySelectorAll('textarea').forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        });
    </script>
</body>

</html>