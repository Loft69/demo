<?php include 'db.php';
if ($_SESSION['user']['login'] != 'Admin')
    die('Доступ запрещен');
if (isset($_POST['upd'])) {
    $aid = $_POST['aid'];
    $st = $_POST['status'];
    mysqli_query($db, "SELECT a.*, u.full_name FROM applications a JOIN users u ON a.user_id = u.id;");
} 
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Панель администратора</h2>
    </header>
    <div class="nav"><a href="index.php">Выход</a></div>
    <div class="container" style="width: 900px;">
        <tr>
            <th>Студент</th>
            <th>Курс</th>
            <th>Статус</th>
            <th>Действие</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?=$row['full_name']?></td>
            <td><?=$row['course_name']?></td>
            <td><?=$row['status']?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="aid" value="<?=$row['id']?>">
                    <select name="status">
                        <option>Идет обучение</option>
                        <option>Обучение завершено</option>
                    </select>
                    <button name="upd">Сменить статус</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </div>
</body>
</html>