<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register user</title>
</head>
<body>

    <form action="formRegisterUser.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome">
        </div>
        <div>
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome">
        </div>
        <div>
            <label for="niver">Aniversário</label>
            <input type="date" name="niver">
        </div>
        <div>
            <label for="passwd">Senha</label>
            <input type="password" name="passwd">
        </div>
        <div>
            <label for="senha_confirm">Repita a senha</label>
            <input type="password" name="senha_confirm">
        </div>

        <p>
            <?php
                include("../admin/msg.php");
            ?>
        </p>

        <p>
        Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.;
        </p>

        <button type="submit">Registrar</button>
    </form>

</body>
</html>