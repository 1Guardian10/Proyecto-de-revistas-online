<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="grid grid-cols-12 gap-4 w-full h-full p-5">
        <div class="col-span-3 flex justify-center items-center"></div>
        <div class="col-span-6 h-full">
            <div class="col-span-6 flex justify-center bg-gray-200 p-6 rounded-lg shadow-lg w-full h-full">
                <div class="container mx-auto h-full">
                    <div class="grid grid-rows-3 grid-cols-2 gap-4 h-full px-4">
                        
                        <div class="col-span-2 row-span-1 mx-auto">
                            <img src="/./src/img/<?php echo $resultados[0]['imagenes'][0]['imagen']; ?>" alt="" class="rounded-full border-2 border-black" width="350px" height="250px">
                        </div>

                        <div>
                            <label class="bg-transparent text-black placeholder-black p-2 w-[80%]"><?php echo $resultados[0]['contenido']['titulo']; ?></label>
                        </div>
                        <div>
                            <label class="bg-transparent text-black placeholder-black p-2 w-[80%]"><?php echo $resultados[0]['contenido']['descripcion']; ?></label>
                        </div>
                        <div class="col-span-1 row-span-1">
                            <label class="bg-transparent text-black placeholder-black p-2 w-[80%]"><?php echo $resultados[0]['subtitulos'][0]['subtitulo']; ?></label>
                            <p class="w-[90%] h-[80%] bg-transparent placeholder-black border-2 border-black"><?php echo $resultados[0]['parrafos'][0]['parrafo']; ?></p>
                        </div>

                        <div class="col-span-1 row-span-1">
                            <label class="bg-transparent text-black placeholder-black p-2 w-[80%]"><?php echo $resultados[0]['subtitulos'][1]['subtitulo']; ?></label>
                            <p class="w-[90%] h-[80%] bg-transparent placeholder-black border-2 border-black"><?php echo $resultados[0]['parrafos'][1]['parrafo']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>