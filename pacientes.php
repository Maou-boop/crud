<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="icon" href="img/logo.png">
    <title>Pacientes</title>
</head>
<body>
    <nav class="main-nav">
        <div class="main-menu_logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <p class="main-nav_title">Pacientes</p>
    </nav>
    <table>
        <tr>
            <th>Nombre dueño</th>
            <th>Apellido Dueño</th>
            <th>Nombre Mascota</th>
            <th>Tipo</th>
            <th>Direccion</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Fecha y hora</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <tbody>
            <?php
                require('./connection.php'); 
                $p=crud::Selectdata();
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    $e=crud::delete($id);
                }
                if (count( $p)>0) {
                    for ($i=0; $i < count( $p); $i++) {
                        echo '<tr>';
                        foreach ( $p[$i] as $key => $value) {
                            if ($key!='id') {
                                echo '<td>'.$value.'</td>';
                            }
                        }
                        ?>

                        <td><a href="pacientes.php?id=<?php echo $p[$i]['id'] ?>"><img src="img/delete.png" alt="delete icon"></a></td>
                        <td><a href="update.php"><img src="img/editing.png" alt="editing icon"></a></td>

                        <?php
                        echo '</tr>';
                    }
                }
            ?>
        </tbody>
    </table>
    <script src="js/script.js"></script>
</body>
</html>