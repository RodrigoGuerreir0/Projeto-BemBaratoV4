<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar e Cadastrar Produto</title>
    <style>
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button-red {
            background-color: #ff0000;
        }

        .alert {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            display: none;
        }

        #sairButton {
            background-color: #ff0000;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar e Cadastrar Produto</h2>

        <?php
        // Verifica se há uma mensagem de sucesso na sessão
        if(isset($_SESSION['success_message'])) {
            // Exibe o alerta de sucesso
            echo '<div class="alert">' . $_SESSION['success_message'] . '</div>';

            // Remove a mensagem da sessão para que ela não seja exibida novamente
            unset($_SESSION['success_message']);
        }

        // Verifica se há uma mensagem de erro na sessão
        if(isset($_SESSION['error_message'])) {
            // Exibe o alerta de erro
            echo '<div class="alert" style="background-color: #dc3545;">' . $_SESSION['error_message'] . '</div>';

            // Remove a mensagem da sessão para que ela não seja exibida novamente
            unset($_SESSION['error_message']);
        }
        ?>

        <form action="editar_produto.php" method="post">
            <label for="codigo_barras">Código de Barras:</label><br>
            <input type="text" id="codigo_barras" name="codigo_barras" required><br><br>
            <input class="button" type="submit" value="Editar">        
        </form>
        <br>
        <a href='cadastrar_produto.php' class='button'>Cadastrar Novo Produto</a>
        <br><br>

        <!-- Botão para Alterações -->
        <form action="produtos_editados_recentes.php" method="get">
            <input class="button" type="submit" value="Alterações"><br><br>
        </form>
        
        <!-- Botão Sair -->
        <a id="sairButton" href="index.php" style="background-color: #ff0000; color: #ffffff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Sair</a>
        
    </div>

    <script>
        // Mostrar o alerta
        var alertBox = document.querySelector(".alert");
        if (alertBox) {
            alertBox.style.display = "block";
            // Esconder o alerta após 3 segundos
            setTimeout(function(){
                alertBox.style.display = "none";
            }, 3000);
        }
    </script>
   
</body>
</html>
,