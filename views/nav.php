<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 shadow-lg">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/public/listarContenido" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Pa Eso?</span>
                </a>

                <button data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-hamburger" aria-expanded="false">
                    <span class="sr-only">Pa eso2?</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>

                <div class="hidden w-full md:flex md:w-auto" id="navbar-hamburger">
                    <ul class="flex flex-col md:flex-row md:space-x-8 md:mt-0 font-medium bg-gray-50 dark:bg-gray-800 md:bg-transparent dark:border-gray-700 p-4 md:p-0 mt-4  rounded-lg md:rounded-none">
                        <li>
                            <a href="/public/listarContenido" class="block py-2 px-3 text-blue-700 bg-blue-100 rounded hover:bg-blue-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:text-white" aria-current="page">Leer</a>
                        </li>
                        <li>
                            <a href="listarPlantillas" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Crear</a>
                        </li>
                        <li>
                            <a href="/public/listarMicontenido" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Revistas</a>
                        </li>
                        <?php if ($_SESSION['rol']==1) { ?>
                        <li>
                        <a href="/public/usuarios" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Usuarios</a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href="/public/cerrar" class="text-gray-900 bg-white border border-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:ring-gray-800">Cerrar Sesion</a>
                    <?php } else {?>
                    <a href="/public/login" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:focus:ring-blue-800">Ingresar</a>
                <?php } ?>
                </div>
        </nav>
    </header>
    <main>
    <?php
        echo $contenido;
        ?>
    </main>
    <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-xl font-bold">Mi Sitio Web</h1>
            </div>
            
            <div class="mb-4 md:mb-0">
                <nav class="space-x-4">
                    <a href="#" class="hover:text-gray-400">Inicio</a>
                    <a href="#" class="hover:text-gray-400">Acerca de</a>
                    <a href="#" class="hover:text-gray-400">Servicios</a>
                    <a href="#" class="hover:text-gray-400">Contacto</a>
                </nav>
            </div>
            
            <div class="text-sm">
                <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>