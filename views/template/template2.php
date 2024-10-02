<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
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
    <div class="grid grid-cols-12 gap-4 w-full h-full ">
        <div class="col-span-3 flex justify-center items-center"> </div>
        <form method="post" action="/public/agregarContenido" class="col-span-6" enctype="multipart/form-data">
            <div class="col-span-6 flex justify-center bg-purple-500 p-6 rounded-lg shadow-lg">
                <div class="container mx-auto">
                    <div class="grid grid-rows-1 grid-cols-2 gap-10 px-4">
                        <div class="col-span-2 row-span-1 bg-blue-950 border-2 border-white justify-center items-center flex h-28">
                            <input class="placeholder-white text-white bg-transparent justify-center items-center mx-auto" type="text" name="contenido[titulo]" placeholder="Titulo" id=""
                                value="<?php isset($resultados[0]['contenido']['titulo']) ? $resultados[0]['contenido']['titulo'] : ''; ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                        <input type="hidden" name="t" value="<?php echo isset($_GET['t']) ? $_GET['t'] : ''; ?>">
                        <input type="hidden" name="contenido[parrafo_id][<?php $resultados[0]['parrafos'][0] ?>]" value="<?php echo isset($resultados[0]['parrafos'][0]['id']) ? $resultados[0]['parrafos'][0]['id'] : ''; ?>">
                        <input type="hidden" name="contenido[parrafo_id][<?php $resultados[0]['parrafos'][1] ?>]" value="<?php echo isset($resultados[0]['parrafos'][1]['id']) ? $resultados[0]['parrafos'][1]['id'] : ''; ?>">
                        <input type="hidden" name="contenido[parrafo_id][<?php $resultados[0]['parrafos'][2] ?>]" value="<?php echo isset($resultados[0]['parrafos'][2]['id']) ? $resultados[0]['parrafos'][2]['id'] : ''; ?>">
                        <input type="hidden" name="contenido[parrafo_id][<?php $resultados[0]['parrafos'][3] ?>]" value="<?php echo isset($resultados[0]['parrafos'][3]['id']) ? $resultados[0]['parrafos'][3]['id'] : ''; ?>">
                        <div class="col-span-1 row-span-1 flex h-40">
                            <div class="container bg-green-300 border-2 border-white w-[85%] p-2 ml-10">
                                <textarea name="contenido[parrafo][0]" class="w-full bg-transparent h-full placeholder-white text-white" placeholder="Texto">
                                    <?php isset($resultados[0]['parrafos'][0]['parrafo']) ? $resultados[0]['parrafos'][0]['parrafo'] : '' ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40 w-48 ">
                            <div class="container w-[75%] flex">
                                <img id="image-preview-0" src="/src/img/<?php isset($resultados[0]['imagenes'][0]['imagen']) ? $resultados[0]['imagenes'][0]['imagen'] : 'paisaje.jpg' ?>" class="w-full h-full border-2 border-white" alt="" style="display: block;">
                                <div class="m-10">
                                    <label class="cursor-pointer flex items-center space-x-2 bg-green-500 text-white py-1 px-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>Subir</span>
                                        <input type="file" class="hidden" id="file-upload-0" name="contenido[imagen][0]" onchange="previewImage(event, 'image-preview-0')" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40 w-48 ">
                            <div class="container w-[75%] flex">
                                <div class="m-10">
                                    <label class="cursor-pointer flex items-center space-x-2 bg-green-500 text-white py-1 px-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>Subir</span>
                                        <input type="file" class="hidden" id="file-upload-1" name="contenido[imagen][1]" onchange="previewImage(event, 'image-preview-1')" accept="image/*">
                                    </label>
                                </div>
                                <img id="image-preview-1" src="/src/img/<?php isset($resultados[0]['imagenes'][1]['imagen']) ? $resultados[0]['imagenes'][1]['imagen'] : 'paisaje.jpg' ?>" class="w-full h-full border-2 border-white" alt="" style="display: block;">
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40">
                            <div class="container bg-pink-400 border-2 border-white w-[85%] p-2 ">
                                <textarea class="w-full bg-transparent h-full placeholder-white text-white" name="contenido[parrafo][1]" placeholder="Texto">
                                <?php isset($resultados[0]['parrafos'][1]['parrafo']) ? $resultados[0]['parrafos'][2]['parrafo'] : '' ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40">
                            <div class="container bg-purple-400 border-2 border-white w-[85%] p-2 ">
                                <textarea class="w-full bg-transparent h-full placeholder-white text-white" name="contenido[parrafo][2]" placeholder="Texto">
                                <?php isset($resultados[0]['parrafos'][2]['parrafo']) ? $resultados[0]['parrafos'][2]['parrafo'] : '' ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40 w-48 ">
                            <div class="container w-[75%] flex">
                                <img id="image-preview-2" src="/src/img/<?php isset($resultados[0]['imagenes'][2]['imagen']) ? $resultados[0]['imagenes'][2]['imagen'] : 'paisaje.jpg' ?>" class="w-full h-full border-2 border-white rotate-3" alt="" style="display: block;">
                                <div class="m-10">
                                    <label class="cursor-pointer flex items-center space-x-2 bg-green-500 text-white py-1 px-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>Subir</span>
                                        <input type="file" class="hidden" id="file-upload-3" name="contenido[imagen][2]" onchange="previewImage(event, 'image-preview-2')" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40 w-48 ">
                            <div class="container w-[75%] flex">
                                <div class="m-10">
                                    <label class="cursor-pointer flex items-center space-x-2 bg-green-500 text-white py-1 px-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>Subir</span>
                                        <input type="file" class="hidden" id="file-upload-2" name="contenido[imagen][3]" onchange="previewImage(event, 'image-preview-3')" accept="image/*">
                                    </label>
                                </div>
                                <img id="image-preview-3" src="/src/img/<?php isset($resultados[0]['imagenes'][3]['imagen']) ? $resultados[0]['imagenes'][3]['imagen'] : 'paisaje.jpg' ?>" class="w-full h-full border-2 border-white" alt="" style="display: block;">
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40">
                            <div class="container bg-blue-900 border-2 border-white w-[85%] p-2 ">
                                <textarea class="w-full bg-transparent h-full placeholder-white text-white" name="contenido[parrafo][3]" placeholder="Texto">
                                <?php isset($resultados[0]['parrafos'][3]['parrafo']) ? $resultados[0]['parrafos'][3]['parrafo'] : '' ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="col-span-2 row-span-1 bg-blue-300 border-2 border-white justify-center items-center flex h-28">
                            <textarea name="contenido[descripcion]" class="placeholder-white text-white bg-transparent mx-auto w-full h-full resize-none" placeholder="Agrega la descripción aquí...">
        <?php isset($resultados[0]['parrafos'][0]['parrafo']) ? $resultados[0]['parrafos'][0]['parrafo'] : '' ?>
    </textarea>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-black text-white p-2 justify-end rounded-lg ">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>