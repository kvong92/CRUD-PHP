<?php
require('./includes/init.php');

$list = $db->prepare("SELECT b.id as bookID, b.title, b.synopsis, a.name FROM books b INNER JOIN author a ON a.id=b.id_author");
$list->execute();
$data = $list->fetchAll(PDO::FETCH_ASSOC);
$getID = $_GET['id'];   
$data_books = $db->prepare("SELECT * FROM books WHERE id=$getID");
$data_books->execute();
$getTitle = $data_books->fetchAll(PDO::FETCH_ASSOC);

$new_synopsis = $_POST['new_synopsis'];
$new_title = $_POST['new_title'];
if (isset($new_title)) 
{
    $update_name = $db->prepare("UPDATE books SET title = $new_title WHERE id=$getID");
    $update_name->execute();
}
if (isset($new_synopsis))
{
    $update_synopsis = $db->prepare("UPDATE books SET synopsis = $new_title WHERE id=$getID");
    $update_synopsis->execute();
}