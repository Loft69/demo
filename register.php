<?php include 'db.php';
if (isset($_POST['register'])) {
    $login = $_POST['login'];
    $password = $_POST['pass'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    mysqli_query($db, "INSTER INTO users(login, password, full_name, phone, email)
    VALUES ($login, $password, $full_name, $phone, $email);");
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Регистрация</h2>

        <form action="" method="post">
            <input type="text" name="login" placeholder="Логин (лат+цифры, от 6)" pattern="[A-Za-z0-9]{6,}" required>
            <input type="password" name="pass" placeholder="Пароль (от 8)" minlength="8" required>
            <input type="text" name="full_name" placeholder="ФИО" pattern="[А-Яа-яёЁ\s]+" required>
            <input type="text" name="phone" placeholder="8(XXX)XXX-XX-XX" pattern="8\(\d{3)\)\d{3}-\d{2}-\d{2}" required>
            <input type="email" name="email" placeholder="email" required>
            <button name="register">Создать пользователя</button>
        </form>
        <a href="login.php">Есть есть аккаунт? Войти</a>
    </div>
</body>
</html>