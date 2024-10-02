<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Contenido</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="grid grid-cols-12 gap-4 w-full h-full p-5">
        <div class="col-span-3 flex justify-center items-center"> </div>
        <div class="col-span-6">
            <div class="col-span-6 flex justify-center bg-purple-500 p-6 rounded-lg shadow-lg">
                <div class="container mx-auto">
                    <div class="grid grid-rows-1 grid-cols-2 gap-10 px-4">
                        <div class="col-span-2 row-span-1 bg-blue-950 border-2 border-white justify-center items-center flex h-28">
                            <p class="placeholder-white text-white bg-transparent justify-center items-center mx-auto">
                            <?php echo $resultados[0]['contenido']['titulo']; ?>
                            </p>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40">
                            <div class="container bg-green-300 border-2 border-white w-[85%] p-2 ml-10">
                                <p class="w-full bg-transparent h-full placeholder-white text-white">
                                    <?php echo $resultados[0]['parrafos'][0]['parrafo'] ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40 w-48 ">
                            <div class="container w-[75%] flex">
                                <img id="image-preview-0" src="/./src/img/<?php echo $resultados[0]['imagenes'][0]['imagen']; ?>" class="w-full h-full border-2 border-white" alt="" style="display: block;">
                            </div>
                        </div>
                        <div class="col-span-1 row-span-1 flex h-40 w-48 ">
                            <div class="container w-[75%] flex">
                                <img id="image-preview-1" src="/./src/img/<?php echo $resultados[0]['imagenes'][1]['imagen']; ?>" class="w-full h-full border-2 border-white" alt="" style="display: block;">
                            </div>
                        </div>
                        <div class="col-span-1 row-span-1 flex h-40">
                            <div class="container bg-pink-400 border-2 border-white w-[85%] p-2 ">
                                <p class="w-full bg-transparent h-full placeholder-white text-white">
                                <?php echo $resultados[0]['parrafos'][1]['parrafo'] ?>
                                </p>
                            </div>
                        </div>
                        

                        <div class="col-span-1 row-span-1 flex h-40">
                            <div class="container bg-purple-400 border-2 border-white w-[85%] p-2 ">
                                <p class="w-full bg-transparent h-full placeholder-white text-white">
                                <?php echo $resultados[0]['parrafos'][2]['parrafo'] ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40 w-48 ">
                            <div class="container w-[75%] flex">
                                <img id="image-preview-2" src="/./src/img/<?php echo $resultados[0]['imagenes'][2]['imagen']; ?>" class="w-full h-full border-2 border-white" alt="" style="display: block;">
                            </div>
                        </div>

                        <div class="col-span-1 row-span-1 flex h-40 w-48 ">
                            <div class="container w-[75%] flex">
                                <img id="image-preview-2" src="/./src/img/<?php echo $resultados[0]['imagenes'][3]['imagen']; ?>" class="w-full h-full border-2 border-white" alt="" style="display: block;">
                            </div>
                        </div>
                        <div class="col-span-1 row-span-1 flex h-40">
                            <div class="container bg-blue-900 border-2 border-white w-[85%] p-2 ">
                                <p class="w-full bg-transparent h-full placeholder-white text-white">
                                <?php echo $resultados[0]['parrafos'][3]['parrafo'] ?>
                                </p>
                            </div>
                        </div>

                        

                        <div class="col-span-2 row-span-1 bg-blue-300 border-2 border-white justify-center items-center flex h-28">
                            <p class="placeholder-white text-white bg-transparent justify-center items-center mx-auto">
                                <?php echo $resultados[0]['contenido']['descripcion']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>