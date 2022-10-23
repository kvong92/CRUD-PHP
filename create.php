<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    
<section class="content_create">

<form action="action_create.php" id="form_edit" method="POST">
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
    <button type="submit" name="create_confirm">CONFIRMER</button>
</form>
</section>

</body>
</html>