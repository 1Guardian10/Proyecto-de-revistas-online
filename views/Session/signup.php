<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen" style="background-color: #000000;">

    <div class="container p-8 rounded-xl shadow-lg w-full max-w-md" style="background-color: #000000; border: 1px solid rgba(45, 212, 191, 0.3); box-shadow: 0 0 10px rgba(45, 212, 191, 0.5);">

        <h1 class="text-teal-400 text-3xl font-bold text-center mb-6">Regístrate</h1>
        <form action="/public/signupf" method="post">
            <fieldset class="space-y-4">

                <div class="form-group">
                    <label for="nombre" class="block text-teal-400">Nombre de usuario:</label>
                    <input type="text" id="nombre" name="usuario[username]" class="w-full p-2 bg-[#000000] text-white border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400" required style="border: 1px solid rgba(45, 212, 191, 0.3); box-shadow: inset 0 0 5px rgba(45, 212, 191, 0.5);">
                </div>

                <div class="form-group">
                    <label for="email" class="block text-teal-400">Email:</label>
                    <input type="email" id="email" name="usuario[email]" class="w-full p-2 bg-[#000000] text-white border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400" required style="border: 1px solid rgba(45, 212, 191, 0.3); box-shadow: inset 0 0 5px rgba(45, 212, 191, 0.5);">
                </div>

                <div class="form-group">
                    <label for="password" class="block text-teal-400">Contraseña:</label>
                    <input type="password" id="password" name="usuario[password]" class="w-full p-2 bg-[#000000] text-white border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400" required style="border: 1px solid rgba(45, 212, 191, 0.3); box-shadow: inset 0 0 5px rgba(45, 212, 191, 0.5);">
                </div>

                <div class="form-group">
                    <label for="rol" class="block text-teal-400">Rol:</label>
                    <select id="rol" name="usuario[role_id]" class="w-full p-2 bg-[#000000] text-white border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400" required style="border: 1px solid rgba(45, 212, 191, 0.3); box-shadow: inset 0 0 5px rgba(45, 212, 191, 0.5);">
                        <option value="2">Lector</option>
                        <option value="3">Escritor</option>
                    </select>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="submit" class="w-full bg-gradient-to-r from-teal-950 via-teal-400 to-teal-950 text-white font-bold py-2 px-4 rounded-lg mr-2 transition-all hover:scale-105 hover:from-teal-400 hover:via-teal-500 hover:to-teal-600 shadow-md hover:shadow-lg">Aceptar</button>
                    <button type="reset" class="w-full bg-gradient-to-r from-teal-950 via-teal-400 to-teal-950 text-white font-bold py-2 px-4 rounded-lg ml-2 transition-all hover:scale-105 hover:from-teal-400 hover:via-teal-500 hover:to-teal-600 shadow-md hover:shadow-lg">Cancelar</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>