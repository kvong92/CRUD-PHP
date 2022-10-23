<?php require('./includes/init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Liste</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/list.css">
</head>

<body id=body_list>
    <?php require_once('./view/header.php');

    $list = $db->prepare("SELECT b.id as bookID, b.title, b.synopsis, a.name FROM books b INNER JOIN author a ON a.id=b.id_author");
    $list->execute();
    $data = $list->fetchAll(PDO::FETCH_ASSOC);
    // $row = $list->rowCount();
    // var_dump($data);
    ?>

    <section id=content_list>
        <table id=table_books>
            <!-- <thead>
                <th>Titre</th>
                <th>Synopsis</th>
                <th>Auteur</th>
                <th>Catégorie</th>
            </thead> -->
            <tbody>
                <td class="td_title">Titre</td>
                <td class="td_title">Synopsis</td>
                <td class="td_title">Auteur</td>
                <!-- <td class="td_title">Catégorie</td> -->
                <td class="td_title"></td>
                <?php
                foreach ($data as $books) {
                ?>
                    <tr>
                        <td><?= $books['title'] ?></td>
                        <td><?= $books['synopsis'] ?></td>
                        <td><?= $books['name'] ?></td>
                        <!-- <td><?= $books['category'] ?></td> -->
                        <td><a href="edit.php?id=<?= $books['bookID'] ?>">Modifier</a> <a href="delete.php?id=<?= $books['bookID'] ?>">Supprimer</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>