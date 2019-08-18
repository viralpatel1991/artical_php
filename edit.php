<?php

$conn = require_once 'db.php';

if (isset($_POST['edit'])) {
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
        $target_file = $_POST['old_picture_path'];
    }

    // database insertion
    $picture_path = $target_file;
    $article_name = htmlentities($_POST['article_name']);
    $article_body = htmlentities($_POST['article_body']);
    $active = $_POST['active'] == '1' ? 1 : 0;
    $id = htmlentities($_POST['id']);

    $sql = 'UPDATE articles' .
            ' SET article_name = "' . $article_name . '",' .
            ' article_body = "' . $article_body . '",' .
            ' picture_path = "' . $picture_path . '",' .
            ' active = "' . $active . '"' .
            ' WHERE id = ' . $id;

    if ($conn->query($sql) === TRUE) {
        echo "Artikel datei erfolgreich aktualisiert";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    die(header("Location: artikelliste.php"));


} else {
    $id = htmlentities($_GET['id']);

    $sql = 'SELECT * FROM articles where id = "' . $id . '"';
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) === 0) {
        die('kein Datensatz gefunden');

    } else {
        $article = $result->fetch_assoc();
    }
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
        <h3>Edit</h3>
        <hr>

        <form action="edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$article['id']?>">
            <input type="hidden" name="old_picture_path" value="<?=$article['picture_path'] ?>">
            <div class="row">
                <div class="col-sm-1">
                    <p class="text-center" style="margin-bottom: 0">Aktiv</p>
                    <p class="text-center">
                        <input id="active" name="active" type="checkbox" value="1" <?=$article['active']==1 ? 'checked':'' ?> data-toggle="toggle" data-style="ios" data-onstyle="success" data-offstyle="warning" data-size="small">
                    </p>
                </div>
                <div class="col-sm-1">
                    <p style="margin-bottom: 0" class="text-center">ID</p>
                    <p class="text-secondary text-center"><?=$article['id']?></p>
                </div>
                <div class="col-sm-3">
                    <p style="margin-bottom: 0" class="text-center">letzte bearbeitung</p>
                    <p class="text-secondary text-center"><?=$article['last_updated']?></p>
                </div>
                <div class="col-sm-2">
                    <p style="margin-bottom: 0" class="text-center">Bild-Upload</p>
                    <p class="text-secondary text-center"><input type="file" name="article_image" id="article_image">  </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Produktname</label>
                        <input type="text" class="form-control" id="article_name" name="article_name" value="<?=$article['article_name']?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Copytext</label>
                        <textarea name="article_body" class="form-control" id="article_body" rows="10" required><?=$article['article_body']?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-secondary" name="edit">Speichern</button>
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
