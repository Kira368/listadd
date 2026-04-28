<?php include "db.php"; ?>

<?php
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO products (title, price, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $title, $price, $description);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Ошибка добавления!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
</head>
<body>

<h2>Добавление товара</h2>
<form method="POST">
    Название: <br>
    <input type="text" name="title" required><br><br>

    Цена: <br>
    <input type="number" name="price" required><br><br>

    Описание: <br>
    <textarea name="description" required></textarea><br><br>

    <button type="submit" name="add">Добавить</button>
</form>

</body>
</html>
