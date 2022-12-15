<?php

//connection to db

$config = require ('config.php');
$db = new DataBase($config["database"]);

$heading = "Note";
$currentUserId = 2;

$note = $db->query('select * from notes where id = :id', [
    "id" => $_GET['id']
])->findOrFail();

authorize($note['user_Id']  === $currentUserId);

require "views/note.view.php";