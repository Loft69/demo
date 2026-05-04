<?php include 'db.php';
if (isset($_POST['req'])) {
    $uid = $_SESSION['user']['id'];
    $cn = $_POST['course'];
    $sd = $_POST['date'];
    $pm = $_POST['pay'];
    mysqli_query($db, "INSERT INTO applications (user_id, course_name, start_date, payment_method) VALUES ($uid, $cn, $sd, $pm);");
    header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Новая заявка</h2>
        <form method="POST">
            <input type="text" name="course" placeholder="Название курса" required>
            <input type="date" name="date" required>
            <select name="pay">
                <option>Наличными</option>
                <option>Переводом по номеру телефона</option>
            </select>
            <button name="req">Отправить</button>
        </form>
    </div>
</body>
</html>