<div class="container grid grid-cols-3 row-span-1 gap-2 mx-auto mt-10">
    <div class="col-span-1 row-span-1 h-full">
        <form action="" method="POST">
            <input type="hidden" name="valor" value="1">
            <button type="submit">
                <img src="/src/img/11.jpeg" class="h-[80%]" alt="Imagen 1">
            </button>
        </form>
    </div>
    <div class="col-span-1 row-span-1 h-full">
        <form action="" method="POST">
            <input type="hidden" name="valor" value="2">
            <button type="submit">
                <img src="/src/img/2.jpeg" class="h-[80%]" alt="Imagen 2">
            </button>
        </form>
    </div>
    <div class="col-span-1 row-span-1 h-full">
        <form action="" method="POST">
            <input type="hidden" name="valor" value="3">
            <button type="submit">
                <img src="/src/img/5.jpeg" class="h-[80%]" alt="Imagen 3">
            </button>
        </form>
    </div>
</div>

<?php

if (isset($_POST['valor'])) {
    $_SESSION['valor'] = $_POST['valor'];

    switch ($_SESSION['valor']) {
        case 1:
            header('Location: /public/Plantilla1');
            exit();
        case 2:
            header('Location: /public/Plantilla2');
            exit();
        case 3:
            header('Location: /public/Plantilla3');
            exit();
    }
}
?>
