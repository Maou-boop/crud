<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/agendar.css">
    <link rel="icon" href="img/logo.png">
    <title>Login</title>
</head>
<body>
    <main>
        <?php
            require('./connection.php');
            if (isset($_POST['login_button'])) {
                $_SESSION['validate']=false;
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                $p=crud::connect()->prepare('SELECT * FROM admins WHERE email=:e and pass=:p');
                $p->bindValue(':e', $email);
                $p->bindValue(':p', $pass);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                if ($p->rowCount()>0) {
                    $_SESSION['email'] = $email;
                    $_SESSION['pass'] = $pass;
                    $_SESSION['validate']=true;
                    header('location:pacientes.php');
                } else {
                    echo 'acceso denegado';
                }
            }
        ?> 


        <div class="main-form">
            <form action="" method="post" class="form">
                <h1 class="form_title">Login</h1>
                <input type="email" name="email" placeholder="Correo electronico" class="form_item" required>
                <input type="password" name="pass" placeholder="Contraseña" class="form_item" require>
                <input type="submit" value="Login" name="login_button" class="form_button">
            </form>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>