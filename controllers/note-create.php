<?php

require ('Validator.php');

$config = require ('config.php');
$db = new DataBase($config["database"]);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $errors = [];

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_Id) VALUES(:body, :user_Id)', [
            "body" => $_POST['body'],
            "user_Id" => 2
        ]);
    }


}

require 'views/note-create.view.php';