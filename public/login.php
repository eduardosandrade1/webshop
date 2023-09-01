<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="./formLogin.php" method="post">
            <div class="form-input">
                <label for="">Email</label>
                <input type="text" name="email">
            </div>
            <div class="form-input">
                <label for="">password</label>
                <input type="password" name="pwd">
            </div>

            
            <button type="submit">Entrar</button>

            <p>
                <a href="registerUser.php">cadastre-se</a>
            </p>

            <p>
                <?php
                    include("../admin/msg.php");
                ?>
            </p>
        </form>
    </div>
</body>
</html>