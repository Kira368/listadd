<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Все товары</title>
</head>
<body>

<h2>Список товаров</h2>
<a href="add.php">Добавить товар</a>
<br><br>

<?php
$result = $conn->query("SELECT * FROM products ORDER BY id DESC");

while ($row = $result->fetch_assoc()):
?>

<div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
    <h3><?= $row['title'] ?></h3>
    <p>Цена: <?= $row['price'] ?>₸</p>
    <p><?= $row['description'] ?></p>

    <a href="edit.php?id=<?= $row['id'] ?>">Редактировать</a> |
    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Удалить товар?');">Удалить</a>
</div>

<?php endwhile; ?>

</body>
</html>




