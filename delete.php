<?php

$conn = require_once 'db.php';

if (isset($_GET['id'])) {
    $sql = 'DELETE FROM articles where id = ' . $_GET['id'];

    if ($conn->query($sql) === TRUE) {
        echo "record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    die(header("Location: artikelliste.php"));
}