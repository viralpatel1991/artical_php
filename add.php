<?php

$conn = require_once 'db.php';

if (isset($_POST['add'])) {

    if (strlen($_FILES['article_image']['name']) != 0) {
        // manage uploaded image
        $date = (new DateTime())->format('Y-m-d_H-i-s');
        $target_dir = 'assets/images/';
        $target_file = $target_dir . $date . '_' . $_FILES['article_image']['name'];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['article_image']['tmp_name']);
        if ($check !== false) {
            echo 'Datei ist ein Bild - ' . $check['mime'] . '.';
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            die('Datei ist kein Bild.');
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
            die('Datei bereits vorhanden ist.');
        }
        // Check file size
        if ($_FILES['article_image']['size'] > 500000) {
            $uploadOk = 0;
            die('Ihre Datei ist zu groß.');
        }
        // Allow certain file formats
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'svg') {
            $uploadOk = 0;
            die('JPG, JPEG, PNG & GIF Dateien sind erlaubt.');
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo 'Ihre Datei wurde nicht hochgeladen.';
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES['article_image']['tmp_name'], $target_file)) {
                echo 'Die Datei ' . $target_file . ' wurde hochgeladen.';
            } else {
                die('Es gibt einen Fehler beim Hochladen Ihrer Datei.');
            }
        }
    } else {
        $target_file = '';
    }

    // database insertion
    $picture_path = $target_file;
    $article_name = htmlentities($_POST['article_name']);
    $article_body = htmlentities($_POST['article_body']);
    $active = $_POST['active'] == '1' ? 1 : 0;

    $sql = 'INSERT INTO articles (article_name, article_body, picture_path, active) 
            VALUES ("' . $article_name .'", "' . $article_body . '", "' . $picture_path .'", ' . $active .')';

    if ($conn->query($sql) === TRUE) {
        echo "Neue Artikel Daten erfolgreich angelegt";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    die(header("Location: artikelliste.php"));
}
?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container mt-5">
        <h3>Artikel hinzufügen</h3>
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Bild-Upload</label>
                        <input type="file" class="form-control-file" name="article_image" id="article_image">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Aktiv</label>
                        <input id="active" name="active" type="checkbox" value="1" data-toggle="toggle" data-style="ios" data-onstyle="success" data-offstyle="warning" data-size="small">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Produktname</label>
                        <input type="text" class="form-control" id="article_name" name="article_name" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Copytext</label>
                        <textarea name="article_body" class="form-control" id="article_body" rows="10" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-secondary" name="add">Speichern</button>
                    <a href="artikelliste.php"><button type="button" class="btn btn-danger">Abbrechen</button></a>
                </div>
            </div>
        </form>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-toggle.min.js"></script>
</body>
</html>
