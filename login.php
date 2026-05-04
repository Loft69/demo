<?php include 'db.php';
if (isset($_POST['login'])) {
    $l = $_POST['login'];
    $p = $_POST['pass'];
    $res = mysqli_query($db, "SELECT * FROM users WHERE login=$l AND password=$p;");
    $user = mysqli_fetch_assoc($res);
    if($user) {
        $_SESSION['user'] = $user;
        if ($l == 'Admin')
            header('Location: admin.php');
        else
            header('Location: profile.php');
    } else {
        echo "<script>alert('Неверный логин или пароль');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Вход в систему</h2>

        <form action="" method="post">
            <input type="text" name="login" placeholder="Логин" required>
            <input type="password" name="pass" placeholder="Пароль" required>
            <button name="login">Войти</button>
        </form>
        <a href="register.php">Еще не зарегистрированы? Регистрация</a>
    </div>
</body>
</html>