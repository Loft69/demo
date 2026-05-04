<?php include 'db.php';
    $uid = $_SESSION['user']['id'];
    if (isset($_POST['rev'])) {
        $aid = $_POST['aid'];
        $txt = $_POST['review'];
        mysqli_query($db, "UPDATE applications SET review='$txt' WHERE id=$aid;");
    }

    $apps = mysqli_query($db, "SELECT * FROM applications WHERE user_id=$uidl;");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2>Мои заявки: <?php echo $_SESSION['user']['full_name'] ?></h2>
    </header>
    <div class="nav">
        <a href="add_app.php">Подать заявку</a> | <a href="index.php">Выход</a>
    </div>
    <div class="container" style="width: 800px;">
        <table>
            <tr>
                <th>Курс</th>
                <th>Дата</th>
                <th>Статус</th>
                <th>Отзыв</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($apps)): ?>
            <tr>
                <td><?=$row['course_name']?></td>
                <td><?=$row['start_date']?></td>
                <td><b><?=$row['status']?></b></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="aid" value="<?=$row['id']?>">
                        <input type="text" name="review" value="<?=$row['review']?>" placeholder="Ваш отзыв">
                        <button name="rev">Ок</button>
                    </form>
                </td>
            </tr>

            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>