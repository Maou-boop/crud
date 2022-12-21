<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/agendar.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="icon" href="img/logo.png">
    <title>Agendar hora</title>
</head>
<body>
    <nav class="main-nav">
        <div class="main-menu_logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <p class="main-nav_title">Pacientes</p>
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
                    $p=crud::connect()->prepare('UPDATE paciente SET nomDueno=:n,apeDueno=:a,nomMascota=:nm,tipo=:t,direccion=:d,celular=:c,email=:e,hora=:h');
                    $p->bindValue(':n', $nomDueno);
                    $p->bindValue(':a', $apeDueno);
                    $p->bindValue(':nm', $nomMascota);
                    $p->bindValue(':t', $tipo);
                    $p->bindValue(':d', $direccion);
                    $p->bindValue(':c', $celular);
                    $p->bindValue(':e', $email);
                    $p->bindValue(':h', $hora);
                    $p->execute();

                    echo 'Datos actualizados!';


                }
            }
        ?> 


        <div class="main-form">
            <form action="" method="post" class="form">
                <h1 class="form_title">Actualizar datos</h1>
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
                <input type="submit" value="Actualizar" name="agendar_button" class="form_button" required>
            </form>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>