<?php

require('./includes/init.php');


if (isset($_POST['title']) == NULL)
{
    
}
$create = $DB_CRUD->prepare("INSERT INTO `books` (`title`, `synopsis`) VALUES ($title, $synopsis);");
$create->execute();