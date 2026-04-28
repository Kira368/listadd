<?php include "db.php"; ?>

<?php
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();

if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE products SET title=?, price=?, description=? WHERE id=?");
    $stmt->bind_param("sisi", $title, $price, $description, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Редактировать товар</title>
</head>
<body>

<h2>Редактирование товара</h2>

<form method="POST">
    Название: <br>
    <input type="text" name="title" value="<?= $product['title'] ?>" required><br><br>

    Цена: <br>
    <input type="number" name="price" value="<?= $product['price'] ?>" required><br><br>

    Описание: <br>
    <textarea name="description" required><?= $product['description'] ?></textarea><br><br>

    <button type="submit" name="edit">Сохранить</button>
</form>

</body>
</html>


