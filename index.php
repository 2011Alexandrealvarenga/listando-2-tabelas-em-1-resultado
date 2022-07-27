<?php 
session_start(); 
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar em duas tabelas</title>
</head>
<body>
    <h3>Listar Usuarios</h3>
    <?php 
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
        $query_usuarios = "SELECT usr.id, usr.nome, usr.email, 
                            ende.logradouro, ende.numero
                            FROM usuarios usr
                            LEFT JOIN endereco AS ende ON ende.usuario_id=usr.id
                            ORDER BY usr.id DESC";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            echo '<pre>';
                print_r($row_usuario);
            echo '</pre>';

            extract($row_usuario);
            echo "id do usuario: $id <br>";
            echo "nome do usuario: $nome <br>";
            echo "email do usuario: $email <br>";
            echo "endereco do usuario: $logradouro <br>";
            echo "numero do usuario: $numero <br>";
            echo "<hr>";
        }
    ?>
</body>
</html>