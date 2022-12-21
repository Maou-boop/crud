<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/agendar.css">
    <link rel="icon" href="img/logo.png">
    <title>Agendar hora</title>
</head>
<body>
        <nav class="main-nav">
            <div id="toggle-menu" class="toggle-menu">
                <img src="img/Hamburger_icon.png" alt="">
            </div>
            <div class="main-menu_logo">
                <a href="index.php"><img src="img/logo.png" alt=""></a>
            </div>
            <ul id="main-menu" class="main-menu">
                <li class="main-menu_item">
                    <a href="index.php" class="main-menu_link">Inicio</a>
                </li>
                <li class="main-menu_item">
                    <a href="#" class="main-menu_link">Contacto</a>
                </li>
                <li class="main-menu_item">
                    <a href="#" class="main-menu_link">Sobre nosotros</a>
                </li>
                <li class="main-menu_item">
                    <a href="#" class="main-menu_link">Ubicación</a>
                </li>
                <li class="main-menu_item">
                    <a href="login.php" class="main-menu_link">Login</a>
                </li>
            </ul>
        </nav>
    </div>
    <main>
        <?php
            require('./connection.php');
            if (isset($_POST['agendar_button'])) {
                $nomDueno=$_POST['nomDueno'];
                $apeDueno=$_POST['apeDueno'];
                $nomMascota=$_POST['nomMascota'];
                $tipo=$_POST['tipo'];
                $direccion=$_POST['direccion'];
                $celular=$_POST['celular'];
                $email=$_POST['email'];
                $hora=$_POST['hora'];
                if (!empty($_POST['nomDueno']) && !empty($_POST['apeDueno']) && !empty($_POST['nomMascota']) && !empty($_POST['tipo']) && !empty($_POST['direccion']) && !empty($_POST['celular']) && !empty($_POST['email']) && !empty($_POST['hora'])) {
                    $p=crud::connect()->prepare('INSERT INTO paciente(nomDueno, apeDueno, nomMascota, tipo, direccion, celular, email, hora) VALUES(:n, :a, :nm, :t, :d, :c, :e, :h)');
                    $p->bindValue(':n', $nomDueno);
                    $p->bindValue(':a', $apeDueno);
                    $p->bindValue(':nm', $nomMascota);
                    $p->bindValue(':t', $tipo);
                    $p->bindValue(':d', $direccion);
                    $p->bindValue(':c', $celular);
                    $p->bindValue(':e', $email);
                    $p->bindValue(':h', $hora);
                    $p->execute();

                    header('location:success.php');


                }
            }
        ?> 


        <div class="main-form">
            <form action="" method="post" class="form">
                <h1 class="form_title">Agendar hora</h1>
                <input type="text" name="nomDueno" placeholder="Nombre Dueño" class="form_item" required>
                <input type="text" name="apeDueno" placeholder="Apellido Dueño" class="form_item" required>
                <input type="text" name="nomMascota" placeholder="Nombre Mascota" class="form_item" required>
                <input type="text" name="tipo"
                placeholder="tipo" class="form_item" required>
                <input type="text" name="direccion"
                placeholder="Dirección" class="form_item" required>
                <input type="text" name="celular" placeholder="Celular Ej:976822123" class="form_item" required>
                <input type="email" name="email" placeholder="Correo electronico" class="form_item" required>
                <input type="datetime-local" name="hora" class="form_item" required>
                <input type="submit" value="Agendar" name="agendar_button" class="form_button" required>
            </form>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>