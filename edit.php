<?php require('./includes/init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Edit</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/list.css">
    <link rel="stylesheet" href="./assets/css/edit.css">
</head>

<body>
    <?php
    require_once('./view/header.php');

    $list = $db->prepare("SELECT b.id as bookID, b.title, b.synopsis, a.name FROM books b INNER JOIN author a ON a.id=b.id_author");
    $list->execute();
    $data = $list->fetchAll(PDO::FETCH_ASSOC);
    $getID = $_GET['id'];
    $data_books = $db->prepare("SELECT * FROM books WHERE id=$getID");
    $data_books->execute();
    $getTitle = $data_books->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($getTitle[0]['id']);
    ?>

    <section class="content_edit">

        <h2><?= $getTitle[0]['title'] ?></h2>
        <form action="action_edit.php?id=<?= $getTitle[0]['id'] ?>" id="form_edit" method="POST">
            <input method="POST" class="input_class" type="text" name="new_title" placeholder="<?= $getTitle[0]['title'] ?>">
            <input method="POST" class="input_class" type="text" name="new_synopsis" placeholder="<?= $getTitle[0]['synopsis'] ?>">
            <select name="name">
                <option value="" disabled selected>Nom auteur</option>
                <?php
                foreach ($data as $books) {
                ?>
                    <option><?= $books['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <select name="category">
                <option value="" disabled selected>Categories</option>
                <?php
                foreach ($data as $books) {
                ?>
                    <option><?= $books['category'] ?></option>
                <?php
                }
                ?>
            </select>
            <button type="submit" name="edit_confirm">CONFIRMER</button>
        </form>
    </section>
</body>

</html>